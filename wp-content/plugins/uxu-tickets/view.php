<section class="uxu-ticket-status">
  <h3>
    Just nu är festivalen <span id="uxu-ticket-status-festival-length"></span> lång. Köp ditt festivalpass nu och förläng festivalen med <u>15 sekunder</u>
  </h3>
  <div class="uxu-ticket-button-holder">
    <a class="uxu-ticket-button" href="<?php echo $values['current_ticket_url']; ?>">
      <h3 style="width: 100%; display: block; max-width: 100%; margin-top: 0;">
        <?php _e('Köp festivalpass'); ?> 
      </h3>
      <span class="uxu-ticket-left"> Just nu: <?php echo $values['current_ticket_price'] ?><?php _e('kr'); ?> </span>
    </a>
    <span class="uxu-ticket-button-ordinary">Ordinarie pris 1450kr</span>
  </div>
</section>
