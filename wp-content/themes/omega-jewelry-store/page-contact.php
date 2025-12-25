<?php
/**
 * Template Name: Contact Us Custom
 */
get_header(); ?>

<div class="contact-page-wrapper" style="padding: 60px 0; background: #fff;">
    <div class="wrapper">
        
        <!-- Top Info Boxes -->
        <div class="contact-info-boxes" style="display: flex; gap: 30px; margin-bottom: 60px; flex-wrap: wrap;">
            
            <!-- Address -->
            <div class="info-box">
                <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                <h3>Address</h3>
                <p>123 6th Eight Avenue H. 22904, 455 Martinson, Los Angeles</p>
            </div>

            <!-- Email -->
            <div class="info-box">
                <div class="icon"><i class="far fa-envelope"></i></div>
                <h3>Email</h3>
                <p>support@onefocals.com<br>info@onefocals.com</p>
            </div>

            <!-- Phone -->
            <div class="info-box">
                <div class="icon"><i class="fas fa-phone-alt"></i></div>
                <h3>Phone</h3>
                <p>+91 123 456 7890<br>+91 987 654 3210</p>
            </div>

        </div>

        <!-- Bottom Section -->
        <div class="contact-content-grid" style="display: flex; gap: 50px; flex-wrap: wrap;">
            
            <!-- Form -->
            <div class="contact-form-section" style="flex: 1; min-width: 300px;">
                <h2 style="text-align: center; margin-bottom: 30px; font-weight: 700;">Contact Us</h2>
                <form action="" method="post" class="custom-contact-form">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="contact-name" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="contact-email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label>Subject</label>
                        <input type="text" name="contact-subject" placeholder="Subject" required>
                    </div>
                    <div class="form-group">
                        <label>Message</label>
                        <textarea name="contact-message" placeholder="Message" rows="5" required></textarea>
                    </div>
                    <div class="form-submit" style="text-align: center;">
                        <button type="submit" class="submit-btn">SEND</button>
                    </div>
                </form>
            </div>

            <!-- Map -->
            <div class="contact-map-section" style="flex: 1; min-width: 300px;">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d118147.6820206233!2d70.75125556249999!3d22.273630799999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3959c98ac71cdf0f%3A0x76dd15cfbe93ad3b!2sRajkot%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1703166000000!5m2!1sen!2sin" 
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

        </div>

    </div>
</div>

<style>
/* Info Boxes */
.info-box {
    flex: 1;
    border: 1px solid #eee;
    padding: 30px;
    text-align: center;
    border-radius: 4px;
    transition: box-shadow 0.3s;
}
.info-box:hover {
    box-shadow: 0 5px 20px rgba(0,0,0,0.05);
}
.info-box .icon {
    font-size: 24px;
    color: #222;
    margin-bottom: 15px;
}
.info-box h3 {
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 10px;
}
.info-box p {
    font-size: 14px;
    color: #666;
    line-height: 1.6;
}

/* Form Styles */
.custom-contact-form .form-group {
    margin-bottom: 20px;
}
.custom-contact-form label {
    display: none; /* Matching design which usually uses placeholders */
}
.custom-contact-form input, .custom-contact-form textarea {
    width: 100%;
    padding: 12px 15px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 14px;
    outline: none;
}
.custom-contact-form input:focus, .custom-contact-form textarea:focus {
    border-color: #ea988e;
}
.submit-btn {
    background: #ea988e;
    color: #fff;
    border: none;
    padding: 10px 40px;
    border-radius: 25px; /* Pill shape */
    font-weight: 600;
    cursor: pointer;
    text-transform: uppercase;
    transition: background 0.3s;
}
.submit-btn:hover {
    background: #d8877e;
}
</style>

<?php get_footer(); ?>
