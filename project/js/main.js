// Highlight active tab and filter rows
document.querySelectorAll('.tab').forEach(btn => {
    btn.addEventListener('click', () => {
      // set active class
      document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
      btn.classList.add('active');
      const filter = btn.dataset.filter;
      document.querySelectorAll('#patientsTable tbody tr').forEach(row => {
        row.style.display = (filter === 'all' || row.dataset.status === filter) ? '' : 'none';
      });
    });
  });
  
  // Live search
  document.getElementById('searchInput')?.addEventListener('input', e => {
    const term = e.target.value.toLowerCase();
    document.querySelectorAll('#patientsTable tbody tr').forEach(row => {
      const name = row.cells[0].textContent.toLowerCase();
      row.style.display = name.includes(term) ? '' : 'none';
    });
  });
  