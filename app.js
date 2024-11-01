
let items = [
    { id: 1, name: "Q1", description: "answer" },
    { id: 2, name: "Q2", description:   "answer" },
    { id: 3, name: "Q3", description:  "answer"},
];

function addItem(name, description) {
    let newItem = {
        id: items.length + 1,
        name: name,
        description: description,
    };
    items.push(newItem);
    displayItems();
}
 

function displayItems() {
    let itemListHTML = "";
    items.forEach(item => {
        itemListHTML += `<div>

                            <p><strong>${item.name}</strong>: ${item.description}</p>
                           
                        </div>`;
    });
    document.getElementById("itemList").innerHTML = itemListHTML;
}