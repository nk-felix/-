<form action="https://formspree.io/f/manegzwn" method="POST" class="php-email-form" id="contactForm">
  <div class="row gy-4">
    <div class="col-md-6">
      <label for="name" class="pb-2">Your Name</label>
      <input type="text" name="name" id="name" class="form-control" required>
    </div>

    <div class="col-md-6">
      <label for="email" class="pb-2">Your Email</label>
      <input type="email" class="form-control" name="email" id="email" required>
    </div>

    <div class="col-md-12">
      <label for="subject" class="pb-2">Subject</label>
      <input type="text" class="form-control" name="subject" id="subject" required>
    </div>

    <div class="col-md-12">
      <label for="message" class="pb-2">Message</label>
      <textarea class="form-control" name="message" id="message" rows="10" required></textarea>
    </div>

    <div class="col-md-12 text-center">
      <div class="loading">Loading</div>
      <div class="error-message"></div>
      <div class="sent-message">Your message has been sent. Thank you!</div>

      <button type="submit">Send Message</button>
    </div>
  </div>
</form>

<script>
  const form = document.getElementById('contactForm');
  const loadingDiv = form.querySelector('.loading');
  const errorDiv = form.querySelector('.error-message');
  const sentDiv = form.querySelector('.sent-message');
  
  form.addEventListener('submit', async (e) => {
    e.preventDefault();
    
    // Show loading indicator
    loadingDiv.style.display = 'block';
    errorDiv.style.display = 'none';
    sentDiv.style.display = 'none';
    
    try {
      const response = await fetch(form.action, {
        method: form.method,
        body: new FormData(form),
        headers: {
          'Accept': 'application/json'
        }
      });
      
      const data = await response.json();
      
      if (response.ok) {
        // Show success message
        loadingDiv.style.display = 'none';
        sentDiv.style.display = 'block';
        form.reset();
      } else {
        // Show error message
        loadingDiv.style.display = 'none';
        errorDiv.textContent = data.error || 'There was an error submitting the form. Please try again.';
        errorDiv.style.display = 'block';
      }
    } catch (error) {
      loadingDiv.style.display = 'none';
      errorDiv.textContent = 'There was a network error. Please try again.';
      errorDiv.style.display = 'block';
    }
  });
</script>
