//original code
function showBusSchedule() {
    document.getElementById('busSchedule').style.display = 'block';
    document.getElementById('trainSchedule').style.display = 'none';
    document.getElementById('busButton').classList.add('active');
    document.getElementById('trainButton').classList.remove('active');
}

function showTrainSchedule() {
    document.getElementById('trainSchedule').style.display = 'block';
    document.getElementById('busSchedule').style.display = 'none';
    document.getElementById('trainButton').classList.add('active');
    document.getElementById('busButton').classList.remove('active');
}


//simulation code
const busSchedule = [
    { id: 'B1', route: 'City A - City B', arrivalTime: '10:00 AM' },
    { id: 'B2', route: 'City B - City C', arrivalTime: '10:30 AM' },
];

const trainSchedule = [
    { name: 'Train 1', route: 'Station A - Station B', currentLocation: 'Station A', nextStation: 'Station B' },
    { name: 'Train 2', route: 'Station B - Station C', currentLocation: 'Station B', nextStation: 'Station C' },
];

// Function to display bus schedule
function displayBusSchedule() {
    const busTable = document.querySelector('#busSchedule table');
    busTable.innerHTML = '<tr><th>Bus ID</th><th>Route</th><th>Estimated Arrival Time</th></tr>'; // Reset table
    busSchedule.forEach(bus => {
        const row = busTable.insertRow();
        row.insertCell(0).innerText = bus.id;
        row.insertCell(1).innerText = bus.route;
        row.insertCell(2).innerText = bus.arrivalTime;
    });
}

// Function to display train schedule
function displayTrainSchedule() {
    const trainTable = document.querySelector('#trainSchedule table');
    trainTable.innerHTML = '<tr><th>Train Name</th><th>Route (Start - End)</th><th>Current Location</th><th>Next Station</th></tr>'; // Reset table
    trainSchedule.forEach(train => {
        const row = trainTable.insertRow();
        row.insertCell(0).innerText = train.name;
        row.insertCell(1).innerText = train.route;
        row.insertCell(2).innerText = train.currentLocation;
        row.insertCell(3).innerText = train.nextStation;
    });
}

// Function to simulate movement
function simulateMovement() {
    trainSchedule.forEach(train => {
        if (train.currentLocation === train.nextStation) {
            train.currentLocation = train.route.split(' - ')[1]; // Move to the end station
            train.nextStation = 'Arrived';
        } else {
            train.currentLocation = train.nextStation; // Move to the next station
            train.nextStation = train.route.split(' - ')[1]; // Update next station
        }
    });
    displayTrainSchedule(); // Refresh train schedule display
}

// Call display functions on load
window.onload = function() {
    displayBusSchedule();
    displayTrainSchedule();
    setInterval(simulateMovement, 5000); // Update every 5 seconds
};