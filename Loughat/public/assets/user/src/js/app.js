'use strict';
const preloader = document.querySelector('.loader');

function loader() {
  preloader.style.display = 'none';
}

// Input field password type show/hide
function showPassword(id, el) {
  let x = document.getElementById(id);
  if (x.type === 'password') {
    x.type = 'text';
    el.innerHTML =
      '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye-off"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg> ';
  } else {
    x.type = 'password';
    el.innerHTML =
      '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>';
  }
}

// popup-Search
function openSearch() {
  document.getElementById('myOverlay').style.display = 'block';
}

function closeSearch() {
  document.getElementById('myOverlay').style.display = 'none';
}
// Function to show/hide password
function showPassword(inputId, icon) {
  const input = document.getElementById(inputId);
  if (input.type === "password") {
      input.type = "text";
      icon.innerHTML = `
  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye-off">
      <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path>
      <line x1="1" y1="1" x2="23" y2="23"></line>
  </svg>
`;
  } else {
      input.type = "password";
      icon.innerHTML = `
  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
      <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
      <circle cx="12" cy="12" r="3"></circle>
  </svg>
`;
  }
}



// watch course 

document.addEventListener('DOMContentLoaded', function () {
  const lessonLinks = document.querySelectorAll('.lesson-link');
  lessonLinks.forEach(function (link) {
    link.addEventListener('click', function (e) {
      e.preventDefault();
      const lessonWrapper = this.closest('.main-wizard__wrapper');
      document.querySelectorAll('.main-wizard__wrapper').forEach(function (wrapper) {
        wrapper.classList.remove('active');
      });
      lessonWrapper.classList.add('active');
      const lessonType = lessonWrapper.getAttribute('data-lesson-type');
      const lessonTitle = lessonWrapper.getAttribute('data-lesson-title');
      document.getElementById('lesson-title').textContent = lessonTitle;
      if (lessonType === 'video') {
        const videoUrl = lessonWrapper.getAttribute('data-video-url');

        if (videoUrl.includes('youtube.com') || videoUrl.includes('youtu.be')) {
          document.getElementById('main-video-player').style.display = 'none';
          let iframe = document.getElementById('youtube-iframe');
          if (!iframe) {
            iframe = document.createElement('iframe');
            iframe.id = 'youtube-iframe';
            iframe.width = "100%";
            iframe.height = "500";
            iframe.allow =
              "accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture";
            iframe.allowFullscreen = true;
            document.querySelector('.video-area').appendChild(iframe);
          }
          iframe.style.display = 'block';
          let embedUrl = videoUrl;
          if (videoUrl.includes('youtu.be')) {
            embedUrl = videoUrl.replace('youtu.be/', 'www.youtube.com/embed/');
          }
          iframe.src = embedUrl;
        } else {
          const videoPlayer = document.getElementById('main-video-player');
          videoPlayer.style.display = 'block';
          const iframe = document.getElementById('youtube-iframe');
          if (iframe) iframe.style.display = 'none';

          while (videoPlayer.firstChild) {
            videoPlayer.removeChild(videoPlayer.firstChild);
          }
          const source = document.createElement('source');
          source.src = videoUrl;
          source.className = 'w-100';
          videoPlayer.appendChild(source);
          videoPlayer.load();
          videoPlayer.play();
        }
      }
    });
  });

});

// filter 

document.getElementById('filter').addEventListener('click', function (e) {
  e.preventDefault();

  const mainForm = document.getElementById('mainFilterForm');
  mainForm.querySelectorAll('input').forEach(el => el.remove());

  document.querySelectorAll('input[name="categories[]"]:checked').forEach(input => {
      const hiddenInput = document.createElement('input');
      hiddenInput.type = 'hidden';
      hiddenInput.name = 'categories[]';
      hiddenInput.value = input.value;
      mainForm.appendChild(hiddenInput);
  });
  document.querySelectorAll('input[name="levels[]"]:checked').forEach(input => {
      const hiddenInput = document.createElement('input');
      hiddenInput.type = 'hidden';
      hiddenInput.name = 'levels[]';
      hiddenInput.value = input.value;
      mainForm.appendChild(hiddenInput);
  });
  mainForm.submit();
});


















