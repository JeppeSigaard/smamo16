<div class="booking-form">
    <div class="inner">
        <form action="<?php echo admin_url('admin-ajax.php') ?>" method="post">
           <input type="hidden" name="action" value="booking-form"/>
           <input type="hidden" name="form-active" value="false"/>
           <div>
                <span class="preheader">Skal vi arbejde sammen?</span>
                <h3>Book et møde</h3>
           </div>
           <div>
               <input name="navn" type="text" class="required">
               <label for="navn">Dit navn</label>
           </div>
           <div>
               <input name="email" type="email" class="required">
               <label for="email">Din email</label>
           </div>
           <div>
               <input name="firma" type="text">
               <label for="firma">Din virksomhed</label>
           </div>
           <div>
               <a href="#" class="form-button submit success">Send</a>
           </div>
        </form>
    </div>
</div>