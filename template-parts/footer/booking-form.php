<div class="booking-form">
    <div class="inner">
        <form action="<?php echo admin_url('admin-ajax.php') ?>" method="post">
            <input type="hidden" name="action" value="booking-form"/>
            <input type="hidden" name="form-active" value="false"/>
            <div>
                <span class="preheader">Skal vi arbejde sammen?</span>
                <h3>Book et møde</h3>
            </div>
            <section class="form-section form-section-1">
                <div>
                    <p>Hvad kunne du tænke dig at mødes om?</p>
                </div>
                <div class="toggle">
                    <div>
                        <input type="checkbox" value="1">
                        <label>En salgsstrategi</label>   
                    </div>
                    <div>
                        <input type="checkbox" value="1">
                        <label>En ny visuel identitet</label>   
                    </div>
                    <div>
                        <input type="checkbox" value="1">
                        <label>Et moderne teknologisk koncept</label>   
                    </div>
                    <div>
                        <input type="checkbox" value="1">
                        <label>Et fast samarbejde</label>   
                    </div>
                    <div>
                        <input type="checkbox" value="1">
                        <label>Noget andet</label>   
                    </div>
                </div>
                <div class="center">
                    <a href="#" class="form-button fixwide margin outline cta-close">Luk</a>
                    <a href="#" class="form-button fixwide success section-next">Næste (2/3)</a>
                </div> 
            </section>
            <section class="hidden form-section form-section-2">
                <div>
                    <p>Har du allerede et budget?</p>
                </div>
                <div class="toggle toggle-radio">
                    <div>
                        <input type="checkbox" value="1">
                        <label>25.000 - 50.000</label>   
                    </div>
                    <div>
                        <input type="checkbox" value="1">
                        <label>50.000 - 150.000</label>   
                    </div>
                    <div>
                        <input type="checkbox" value="1">
                        <label>150.000 - 400.000</label>   
                    </div>
                    <div>
                        <input type="checkbox" value="1">
                        <label>400.000 + </label>   
                    </div>
                    <div>
                        <input type="checkbox" value="1">
                        <label>Jeg har ikke et budget</label>   
                    </div>
                </div>
                <div class="center">
                   <a href="#" class="form-button fixwide margin outline section-prev">Forrige (1/3)</a>
                    <a href="#" class="form-button success fixwide section-next">Næste (3/3)</a>
                </div>
            </section>
            <section class="hidden form-section form-section-3">
               <div>
                    <p>Alletiders. Fortæl om dig selv, så vi kan kontakte dig for et møde</p>
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
                    <input name="telefon" type="text">
                    <label for="telefon">Dit telefonnummer</label>
                </div>
                <div>
                    <input name="firma" type="text">
                    <label for="firma">Din virksomhed</label>
                </div>
                <div class="center">
                   <a href="#" class="form-button submit fixwide margin outline section-prev">Forrige (2/3)</a>
                    <a href="#" class="form-button submit fixwide success">Send</a>
                </div>
            </section>
        </form>
    </div>
</div>