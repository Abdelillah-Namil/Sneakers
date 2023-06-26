@extends('welcome')

@section('content')
  <header>
    <h1>Contact Us</h1>
  </header>

  <main>
    <section class="contact-form">
      <h2>Get in touch</h2>
      <form action="{{ route('contacts.store') }}" method="POST">
        @csrf <!-- Add CSRF token field for form submission -->
        <input type="text" name="name" placeholder="Your Name" required>
        <input type="email" name="email" placeholder="Your Email" required>
        <textarea name="message" placeholder="Your Message" required></textarea>
        <button type="submit">Send Message</button>
      </form>
    </section>
  </main>
@endsection
