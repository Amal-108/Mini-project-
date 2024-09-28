document.addEventListener("DOMContentLoaded", () => {
    // Example users and batches data
    const users = [
        { id: 1, name: "John Doe", email: "john@example.com", type: "student", batch: "Batch A" },
        { id: 2, name: "Jane Smith", email: "jane@example.com", type: "supervisor", batch: "" }
    ];

    const batches = [
        { name: "Batch A", students: ["John Doe"], supervisor: "Jane Smith" }
    ];

    // Populate user options for forms
    const populateUserOptions = (selectId) => {
        const selectElement = document.getElementById(selectId);
        selectElement.innerHTML = ""; // Clear existing options
        users.forEach(user => {
            const option = document.createElement("option");
            option.value = user.id;
            option.textContent = `${user.name} (${user.type})`;
            selectElement.appendChild(option);
        });
    };

    // Populate batch options for forms
    const populateBatchOptions = (selectId) => {
        const selectElement = document.getElementById(selectId);
        selectElement.innerHTML = ""; // Clear existing options
        batches.forEach(batch => {
            const option = document.createElement("option");
            option.value = batch.name;
            option.textContent = batch.name;
            selectElement.appendChild(option);
        });
    };

    // Show specific section
    window.showSection = (sectionId) => {
        document.querySelectorAll('.section').forEach(section => {
            section.style.display = 'none';
        });
        document.getElementById(sectionId).style.display = 'block';
    };

    // Populate all form selections on page load
    populateUserOptions("selectUser");
    populateUserOptions("deleteUserSelect");
    populateUserOptions("batchUser");
    populateUserOptions("batchSupervisor");
    populateBatchOptions("viewBatchSelect");

    // Handle Add User form submission
    document.getElementById("addUserForm").addEventListener("submit", (event) => {
        event.preventDefault();
        const userName = document.getElementById("userName").value;
        const userEmail = document.getElementById("userEmail").value;
        const userType = document.getElementById("userType").value;
        const userBatch = document.getElementById("userBatch").value;

        users.push({
            id: users.length + 1,
            name: userName,
            email: userEmail,
            type: userType,
            batch: userBatch
        });

        alert("User added successfully!");
        populateUserOptions("selectUser");
        populateUserOptions("deleteUserSelect");
        populateUserOptions("batchUser");
        populateUserOptions("batchSupervisor");
    });

    // Handle Modify User form submission
    document.getElementById("modifyUserForm").addEventListener("submit", (event) => {
        event.preventDefault();
        const selectedUserId = document.getElementById("selectUser").value;
        const userName = document.getElementById("modifyUserName").value;
        const userEmail = document.getElementById("modifyUserEmail").value;

        const user = users.find(u => u.id == selectedUserId);
        if (user) {
            if (userName) user.name = userName;
            if (userEmail) user.email = userEmail;
            alert("User details modified successfully!");
        }
    });

    // Handle Delete User form submission
    document.getElementById("deleteUserForm").addEventListener("submit", (event) => {
        event.preventDefault();
        const selectedUserId = document.getElementById("deleteUserSelect").value;
        const userIndex = users.findIndex(u => u.id == selectedUserId);
        if (userIndex !== -1) {
            users.splice(userIndex, 1);
            alert("User deleted successfully!");
            populateUserOptions("selectUser");
            populateUserOptions("deleteUserSelect");
            populateUserOptions("batchUser");
            populateUserOptions("batchSupervisor");
        }
    });

    // Handle Add Batch form submission
    document.getElementById("addBatchForm").addEventListener("submit", (event) => {
        event.preventDefault();
        const batchUserId = document.getElementById("batchUser").value;
        const batchSupervisorId = document.getElementById("batchSupervisor").value;
        const batchName = document.getElementById("batchName").value;

        const user = users.find(u => u.id == batchUserId);
        const supervisor = users.find(u => u.id == batchSupervisorId);

        if (user && supervisor) {
            batches.push({
                name: batchName,
                students: [user.name],
                supervisor: supervisor.name
            });
            alert("Batch assigned successfully!");
            populateBatchOptions("viewBatchSelect");
        }
    });

    // Handle View Batch Associations form submission
    document.getElementById("viewBatchForm").addEventListener("submit", (event) => {
        event.preventDefault();
        const selectedBatchName = document.getElementById("viewBatchSelect").value;
        const batch = batches.find(b => b.name === selectedBatchName);
        if (batch) {
            const detailsDiv = document.getElementById("batchDetails");
            detailsDiv.innerHTML = `
                <h3>Batch: ${batch.name}</h3>
                <p>Supervisor: ${batch.supervisor}</p>
                <p>Students: ${batch.students.join(', ')}</p>
            `;
        }
    });
});
