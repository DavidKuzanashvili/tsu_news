<div class="subscribe-container">
    <div class="subscribe-wrapper">
        <form method="POST" action="subscribe">
            <button type="button" class="btn notify-btn">Notify Me</button>
            <input id="input" type="email" name="email" placeholder="Email" required>
            <button type="submit" class="submit-btn">Send</button>
            <button type="button" class="btn thanku-btn">Thank You!</button>
            <input type="hidden" name="redirectUrl" value="<?php echo Request::uri(); ?>">
        </form>
    </div>
</div>
