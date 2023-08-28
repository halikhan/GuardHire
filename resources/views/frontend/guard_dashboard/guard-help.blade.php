
<form action="{{route('user.contact.process')}}" method="POST" id="regiterForm" class="from">
    @csrf
    {{-- <input type="text" name="name" placeholder="Full Name" class="wow fadeInLeft" data-wow-delay="0.20s">
    <input type="email" name="email" placeholder="Email"class="wow fadeInRight" data-wow-delay="0.20s">

    <input id="phonebride" class="Artical-input" data-wow-delay="0.30s type="tel" placeholder="Phone No." name="contact"  maxlength="14"  pattern="[(][0-9]{3}[)] [0-9]{3}-[0-9]{4}">
    <textarea name="message" type="message"  id="" placeholder="Message..." class="wow fadeInRight" data-wow-delay="0.30s"></textarea>
    <div class="mt0 loadmore-blue-btn extra-padding">
        <a href="">
            <button>
                Send
            </button>
        </a>
    </div> --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="profileName mb-4">
                <h3>Help!</h3>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="profileField">
                <label>Full Name</label>
                <input type="text" name="name" class="inputName" placeholder="First Name">
                <label>Phone Number</label>
                {{-- <input type="number" name="name" min="0" class="inputName"
                    placeholder="Phone Number"> --}}
                    <input id="phonebride" class="inputName" data-wow-delay="0.30s type="tel" placeholder="Phone No." name="contact"  maxlength="14"  pattern="[(][0-9]{3}[)] [0-9]{3}-[0-9]{4}">
                <label>Email</label>
                <input type="email" name="email" class="inputName" placeholder="email@example.com">
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="profileField">
                <label>Message</label>
                <textarea type="text" name="message" class="inputMessage" placeholder="Type Here..."></textarea>
                <div class="sendBtn text-center">
                    <button type="submit" class="sendButton">Send</button>
                </div>
            </div>
        </div>
    </div>
</form>
<script type="text/javascript">
    document.getElementById('phonebride').addEventListener('input', function(e) {
        var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
        e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
    });
    document.getElementById('phone13').addEventListener('input', function(e) {
        var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
        e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
    });
</script>
