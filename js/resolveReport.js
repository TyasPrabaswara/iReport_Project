function resolveReport(reportId, type) {
    fetch(`resolveReport.php?id=${reportId}&type=${type}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Report resolved successfully!');
                location.reload();
            } else {
                alert('Failed to resolve report.');
            }
        })
        .catch(error => console.error('Error:', error));
}