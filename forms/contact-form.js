document.addEventListener('DOMContentLoaded', function() {
  const form = document.getElementById('contactForm');
  
  if (form) {
    // Completely override the form submission
    form.addEventListener('submit', handleSubmit);
  }
  
  function handleSubmit(event) {
    event.preventDefault();
    
    let formData = new FormData(form);
    let submitButton = form.querySelector('button[type="submit"]');
    let loadingDiv = form.querySelector('.loading');
    let sentDiv = form.querySelector('.sent-message');
    
    // Show loading
    loadingDiv.style.display = 'block';
    sentDiv.style.display = 'none';
    submitButton.disabled = true;
    
    fetch('https://formspree.io/f/manegzwn', {
      method: 'POST',
      body: formData,
      headers: {
        'Accept': 'application/json'
      }
    })
    .then(response => {
      if (response.ok) {
        return response.json();
      }
      throw new Error('Network response was not ok.');
    })
    .then(data => {
      // Hide loading
      loadingDiv.style.display = 'none';
      
      // Show success message
      sentDiv.style.display = 'block';
      
      // Reset form
      form.reset();
    })
    .catch(error => {
      // Hide loading only (no error message shown)
      loadingDiv.style.display = 'none';
      console.error('Submission error:', error); // Optional for debugging
    })
    .finally(() => {
      submitButton.disabled = false;
    });
  }
});
