document.addEventListener("DOMContentLoaded", function () {
    let taskForm = document.getElementById("taskForm");
    let taskList = document.getElementById("taskList");

    function loadTasks() {
        fetch("php/get_tasks.php")
            .then(response => response.json())
            .then(data => {
                taskList.innerHTML = "";
                data.forEach(task => {
                    let taskItem = document.createElement("li");
                    taskItem.classList.add("task-item");
                    taskItem.setAttribute("data-id", task.id);
                    if (task.status === "completed") taskItem.classList.add("completed");

                    taskItem.innerHTML = `
                        <span>${task.task}</span>
                        <button onclick="updateTask(${task.id}, '${task.status}')">✔</button>
                        <button onclick="deleteTask(${task.id})">❌</button>
                    `;
                    taskList.appendChild(taskItem);
                });

                // Initialize Sortable.js for drag-and-drop
                new Sortable(taskList, {
                    animation: 150,
                    onEnd: function (evt) {
                        let items = document.querySelectorAll(".task-item");
                        let updatedOrder = [];
                        items.forEach((item, index) => {
                            updatedOrder.push({ id: item.getAttribute("data-id"), position: index + 1 });
                        });

                        fetch("php/update_order.php", {
                            method: "POST",
                            body: JSON.stringify(updatedOrder),
                            headers: { "Content-Type": "application/json" }
                        });
                    }
                });
            });
    }

    loadTasks();
});
