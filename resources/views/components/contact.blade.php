<div id="contact" class="snap-section backdrop-blur-md flex items-center justify-center w-full h-[100vh] text-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="bg-gray-900/50 backdrop-blur-sm p-8 rounded-lg border-[1px] border-white/10">
                <h2 class="text-4xl font-bold mb-6 text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-cyan-400">
                    Get in touch!
                </h2>

                <form id="contactForm" class="space-y-6" onsubmit="sendEmail(event)">
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium mb-2">Name</label>
                            <input type="text"  name="name" id="name" required
                                   class="w-full px-4 py-2 rounded-lg bg-gray-800 border border-gray-700 focus:border-purple-500 focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50 transition-colors"
                                   placeholder="Your name">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-2">Email</label>
                            <input type="email" name="email" id="email" required
                                   class="w-full px-4 py-2 rounded-lg bg-gray-800 border border-gray-700 focus:border-purple-500 focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50 transition-colors"
                                   placeholder="your@email.com">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-2">Subject</label>
                        <input type="text"
                               class="w-full px-4 py-2 rounded-lg bg-gray-800 border border-gray-700 focus:border-purple-500 focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50 transition-colors"
                               placeholder="Message subject">
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-2">Message</label>
                        <textarea rows="4" name="message" id="message" required
                                  class="w-full px-4 py-2 rounded-lg bg-gray-800 border border-gray-700 focus:border-purple-500 focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50 transition-colors"
                                  placeholder="Your message"></textarea>
                    </div>

                    <div>
                        <button type="submit" id="submitBtn"
                                class="w-full md:w-auto px-8 py-3 rounded-lg bg-gradient-to-r from-purple-600 to-cyan-400 text-white font-medium hover:from-purple-700 hover:to-cyan-500 focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50 transition-all">
                            Send Message
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Add this script at the bottom of your contact component -->
<script>
    (function() {
        // Initialize EmailJS with your public key
        emailjs.init("-iRwwUFq0236fizaG");
    })();

    function sendEmail(e) {
        e.preventDefault();
        
        const btn = document.getElementById('submitBtn');
        btn.disabled = true;
        btn.textContent = 'Sending...';

        const templateParams = {
            from_name: document.getElementById('name').value,
            from_email: document.getElementById('email').value,
            message: document.getElementById('message').value
        };

        emailjs.send("service_lkr2r6a", "template_9keo4ms", templateParams)
            .then(function(response) {
                console.log("SUCCESS!", response.status, response.text);
                alert("Message sent successfully!");
                document.getElementById('contactForm').reset();
            }, function(error) {
                console.log("FAILED...", error);
                alert("Failed to send message. Please try again.");
            })
            .finally(() => {
                btn.disabled = false;
                btn.textContent = 'Send Message';
            });
    }
</script>
