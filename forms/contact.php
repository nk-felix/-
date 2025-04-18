
<div class="col-lg-7">
  <form action="https://formspree.io/f/manegzwn" method="POST" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
    <div class="row gy-4">

      <div class="col-md-6">
        <label for="name-field" class="pb-2">Your Name</label>
        <input type="text" name="name" id="name-field" class="form-control" required>
      </div>

      <div class="col-md-6">
        <label for="email-field" class="pb-2">Your Email</label>
        <input type="email" class="form-control" name="email" id="email-field" required>
      </div>

      <div class="col-md-12">
        <label for="subject-field" class="pb-2">Subject</label>
        <input type="text" class="form-control" name="subject" id="subject-field" required>
      </div>

      <div class="col-md-12">
        <label for="message-field" class="pb-2">Message</label>
        <textarea class="form-control" name="message" rows="10" id="message-field" required></textarea>
      </div>

      <div class="col-md-12 text-center">
        <div class="loading">Loading</div>
        <div class="error-message"></div>
        <div class="sent-message">Your message has been sent. Thank you!</div>

        <button type="submit">Send Message</button>
      </div>

    </div>
  </form>
</div><!-- End Contact Form -->
