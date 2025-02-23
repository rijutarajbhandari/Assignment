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
                    if (task.status === "completed") taskItem.classList.add("completed");

                    taskItem.innerHTML = `
                        <span>${task.task}</span>
                        <button onclick="updateTask(${task.id}, '${task.status}')">✔</button>
                        <button onclick="deleteTask(${task.id})">❌</button>
                    `;
                    taskList.appendChild(taskItem);
                });
            });
    }

    taskForm.addEventListener("submit", function (e) {
        e.preventDefault();
        let taskInput = document.getElementById("taskInput").value;

        fetch("php/add_task.php", {
            method: "POST",
            body: new URLSearchParams({ task: taskInput }),
            headers: { "Content-Type": "application/x-www-form-urlencoded" }
        }).then(() => {
            taskInput = "";
            loadTasks();
        });
    });

    window.updateTask = function (id, status) {
        let newStatus = status === "pending" ? "completed" : "pending";
        fetch("php/update_task.php", {
            method: "POST",
            body: new URLSearchParams({ id: id, status: newStatus }),
            headers: { "Content-Type": "application/x-www-form-urlencoded" }
        }).then(loadTasks);
    };

    window.deleteTask = function (id) {
        fetch("php/delete_task.php", {
            method: "POST",
            body: new URLSearchParams({ id: id }),
            headers: { "Content-Type": "application/x-www-form-urlencoded" }
        }).then(loadTasks);
    };

    loadTasks();
});
