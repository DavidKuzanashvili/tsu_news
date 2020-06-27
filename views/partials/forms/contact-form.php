<div class="form-container">
    <div class="form-wrapper">
        <form method="POST" action="/send-message">
            <div class="input-group">
                <input type="text" required />
                <span class="inputBar"></span>
                <label>Name</label>
            </div>

            <div class="input-group">
                <input type="text" required />
                <span class="inputBar"></span>
                <label>Email</label>
            </div>

            <div class="input-group">
                <textarea type="textarea" required></textarea>
                <span class="inputBar"></span>
                <label>Message</label>
            </div>

            <button>Send</button>
        </form>
    </div>
</div>