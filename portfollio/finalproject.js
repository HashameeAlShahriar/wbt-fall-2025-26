document.addEventListener('DOMContentLoaded', function() {
    const reportBtn = document.getElementById('reportBtn');
    const monitorBtn = document.getElementById('monitorBtn');
    const reportSection = document.getElementById('reportSection');
    const monitorSection = document.getElementById('monitorSection');
    const incidentForm = document.getElementById('incidentForm');
    const incidentList = document.getElementById('incidentList');

    // Toggle sections
    reportBtn.addEventListener('click', () => {
        reportSection.classList.remove('hidden');
        monitorSection.classList.add('hidden');
    });
    monitorBtn.addEventListener('click', () => {
        reportSection.classList.add('hidden');
        monitorSection.classList.remove('hidden');
        loadIncidents();
    });

    //Submit
    incidentForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData();
        formData.append('title', document.getElementById('title').value);
        formData.append('description', document.getElementById('description').value);
        formData.append('category', document.getElementById('category').value);
        formData.append('priority', document.getElementById('priority').value);

        fetch('backend/submit_incident.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            incidentForm.reset();
        })
        .catch(error => console.error('Error:', error));
    });





    function loadIncidents() {
        fetch('backend/get_incidents.php')
        .then(response => response.json())
        .then(data => {
            incidentList.innerHTML = '';
            data.incidents.forEach(incident => {
                const card = document.createElement('div');
                card.className = `incident-card priority-${incident.priority.toLowerCase()}`;
                card.innerHTML = `
                    <h3>${incident.title}</h3>
                    <p><strong>Status:</strong> ${incident.status}</p>
                    <p><strong>Priority:</strong> ${incident.priority}</p>
                    <p><strong>Description:</strong> ${incident.description}</p>
                    <p><strong>Reported:</strong> ${incident.created_at}</p>
                `;
                incidentList.appendChild(card);
            });
        })
        .catch(error => console.error('Error loading incidents:', error));
    }


    setInterval(() => {
        if (!monitorSection.classList.contains('hidden')) {
            loadIncidents();
        }
    }, 5000); // 5sec
});
