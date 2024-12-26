const monthNames = [
    "Januari", "Februari", "Maret", "April", "Mei", "Juni", 
    "Juli", "Agustus", "September", "Oktober", "November", "Desember"
  ];
  
  let currentMonth = new Date().getMonth(); // Current month (0-11)
  let currentYear = new Date().getFullYear(); // Current year
  let currentDay = new Date().getDate(); // Current day
  
  function changeMonth(increment) {
    currentMonth += increment;
    if (currentMonth < 0) {
      currentMonth = 11;
      currentYear--;
    } else if (currentMonth > 11) {
      currentMonth = 0;
      currentYear++;
    }
    updateCalendar();
  }
  
  function updateCalendar() {
    const firstDay = new Date(currentYear, currentMonth, 1).getDay(); // First day of the month
    const lastDate = new Date(currentYear, currentMonth + 1, 0).getDate(); // Last day of the month
    const calendarBody = document.getElementById("calendar-body");
    const monthName = document.getElementById("month-name");
  
    monthName.innerText = `${monthNames[currentMonth]} ${currentYear}`;
    calendarBody.innerHTML = ''; // Clear previous calendar
  
    // Fill empty spaces before the first day of the month
    for (let i = 0; i < firstDay; i++) {
      const emptyCell = document.createElement('div');
      emptyCell.classList.add('calendar-day');
      calendarBody.appendChild(emptyCell);
    }
  
    // Fill in the days of the month
    for (let day = 1; day <= lastDate; day++) {
      const dayCell = document.createElement('div');
      dayCell.classList.add('calendar-day');
      dayCell.textContent = day;
  
      // Check if this is today's date
      if (day === currentDay && currentMonth === new Date().getMonth() && currentYear === new Date().getFullYear()) {
        dayCell.classList.add('active'); // Add 'active' class to today's date
      }
  
      calendarBody.appendChild(dayCell);
    }
  }
  
  // Initialize the calendar when the page loads
  updateCalendar();
  