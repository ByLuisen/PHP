<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
    <div>
        <label for="agree"> <input type="checkbox" name="agree" value="yes" id="agree" /> I agree to the <a href="#" title="term of service"> Term of Service</a></label>
        <small class="error"><?php echo $errors['agree'] ?? '' ?>
        </small>
    </div>

    <div>
        <button type="submit">Join Us</button>
    </div>
</form>