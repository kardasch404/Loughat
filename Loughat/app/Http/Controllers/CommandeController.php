<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommandeRequest;
use App\Repositories\CommandeRepository;
use App\Repositories\CoursRepository;
use App\Repositories\PaymentRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Log;

class CommandeController extends Controller
{
    //
    protected $commandeRepository;
    protected $coursRepository;
    protected $userRepository;
    protected $paymentRepository;

    public function __construct(CommandeRepository $commandeRepository, CoursRepository $coursRepository, UserRepository $userRepository, PaymentRepository $paymentRepository)
    {
        $this->commandeRepository = $commandeRepository;
        $this->coursRepository = $coursRepository;
        $this->userRepository = $userRepository;
        $this->paymentRepository = $paymentRepository;
    }

    public function store(CommandeRequest $request)
    {
        // dd('jhg');
        try {

            $user = session('user_id');
            if (! $user) {
                return response()->json([
                    'message' => false
                ]);
            }
            $data = $request->validated();
            $cours = $this->coursRepository->find($data['cours_id']);
            if (!$cours) {
                return redirect()->back();
            }
            $commande = $this->commandeRepository->create($data, $data['cours_id'], $user);
            // if ($commande) {
            //     return response()->json([
            //         'message' => 'Commande created success'
            //     ], 201);
            // } 
            if ($request->has('redirect_to_checkout')) {
                return redirect()->route('checkout', ['commandeId' => $commande->id]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'message' => 'Commande not created '
            ], 500);
        }
    }
    public function index()
    {
        try {
            $commandes = $this->commandeRepository->all();
            // if ($commandes) {
            //     return response()->json([
            //         'commandes' => $commandes
            //     ], 200);
            // }
            return view('admindashboard.transactions-list', compact('commandes'));
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'message' => 'Commande not found '
            ], 500);
        }
    }
    public function showCommandeByteacher()
    {
        try {
            $teacherId = session('user_id');
            $commandes = $this->commandeRepository->getAllCommandeFromTeacher($teacherId);
            // if ($commandes) {
            //     return response()->json([
            //         'commandes' => $commandes
            //     ], 200);
            // }
            return view('teacherdashboard.teacher-transaction', compact('commandes'));
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'message' => 'Commande not found '
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $commande = $this->commandeRepository->find($id);
            if ($commande) {
                return response()->json([
                    'commande' => $commande
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'message' => 'Commande not found '
            ], 500);
        }
    }


    public function getAllCommandeByStudent()
    {
        try {
            $userId = session('user_id');
            $user = $this->userRepository->find($userId);

            if (!$user) {
                return redirect()->route('login');
            }

            $commandes = $this->commandeRepository->getAllCommandesForStudentPaidOrNotPaid($userId);
            if ($commandes === false) {
                return view('students-profile', compact('user'))->with('commandes', [])
                    ->with('courses', []);
            }

            $courses = [];
            foreach ($commandes as $commande) {
                $payment = $this->paymentRepository->findByCommandId($commande->id);
                if ($commande->cours) {
                    $courses[] = $commande->cours;
                }
            }

            return view('students-profile', compact('commandes', 'user', 'courses'));
        } catch (\Exception $e) {
            return view('error', [
                'message' => $e->getMessage()
            ]);
        }
    }
}
