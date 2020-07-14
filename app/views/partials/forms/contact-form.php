<div class="form-container">
    <div class="form-wrapper">
        <form method="POST" action="/send">
            <div class="input-group">
                <input type="text" name="name" required />
                <span class="inputBar"></span>
                <label>Name</label>
            </div>

            <div class="input-group">
                <input type="text" name="email" required />
                <span class="inputBar"></span>
                <label>Email</label>
            </div>

            <div class="input-group">
                <textarea type="textarea" name="message" required></textarea>
                <span class="inputBar"></span>
                <label>Message</label>
            </div>

            <button type="submit">Send</button>
        </form>
    </div>
</div>