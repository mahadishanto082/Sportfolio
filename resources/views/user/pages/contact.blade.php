@extends('layouts.website')

{{-- Bootstrap Icons --}}

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<section class="py-5">
    <div class="container">

        <!-- PAGE TITLE -->
        <div class="mb-4">
            <h2>Contact Us</h2>
            <p >We’d love to hear about your project idea.</p>
        </div>

        <div class="row g-4">

            <!-- LEFT SIDE → CONTACT OPTIONS -->
            <div class="col-md-4">

                <!-- WHATSAPP -->
                <div class="card p-3 shadow-sm mb-4">
                    <h5>
                        <i class="bi bi-whatsapp me-2 text-success"></i> WhatsApp
                    </h5>
                    <p class="text-muted">Chat with us instantly.</p>

                    <a href="https://wa.me/8801717489175" 
                       target="_blank" 
                      >
                        <i class="bi bi-whatsapp me-1"></i> Click here
                    </a>
                </div>

                <!-- EMAIL -->
                <div class="card p-3 shadow-sm">
                    <h5>
                        <i class="bi bi-envelope-fill me-2 text-primary"></i> Email
                    </h5>
                    <p class="text-muted">Send us a direct email anytime.</p>

                    <a href="mailto:info@stradigtech.com" 
                       >
                        <i class="bi bi-envelope-fill me-1"></i> Send Email
                    </a>
                </div>

            </div>

            <!-- RIGHT SIDE → PROJECT FORM -->
            <div class="col-md-8">
                <div class="card p-4 shadow-sm">

                    <h5 class="mb-3">Tell Us About Your Project</h5>

                    <form action="{{ route('contact.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Name *</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email *</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Project Idea *</label>
                            <textarea name="project_idea" class="form-control" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Features You Want</label>
                            <textarea name="features" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Attach Document (optional)</label>
                            <input type="file" name="attachment" class="form-control" 
                                accept=".pdf,.doc,.docx,.txt,.jpg,.jpeg,.png">
                            <small class="text-muted">Accepted formats: PDF, DOC, DOCX, TXT, JPG, PNG (Max: 5MB)</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Budget (optional)</label>
                            <input type="text" name="budget" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Timeline (optional)</label>
                            <input type="text" name="timeline" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-dark">
                            Submit Inquiry
                        </button>
                    </form>
                    <!-- Success Message -->
                    @if(session('success'))
                        <div id="success-message" class="alert alert-success" style="position: fixed; top: 20px; right: 20px; z-index: 9999;">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</section>
<script>
    // Auto-hide success message after 5 seconds
    document.addEventListener('DOMContentLoaded', function() {
        var successMessage = document.getElementById('success-message');
        if (successMessage) {
            setTimeout(function() {
                successMessage.style.display = 'none';
            }, 5000); // 5000 milliseconds = 5 seconds
        }
    });

@endsection
