<section class="uxu-ticket-status">
  <a class="uxu-ticket-button" href="<?php echo $values['current_ticket_url']; ?>">
    <h3 style="width: 100%; display: block; max-width: 100%;">
      <?php _e('Köp festivalpass'); ?> 
    </h3>
    <span class="uxu-ticket-left" style="font-size: 1.2em"> Just nu: <?php echo $values['current_ticket_price'] ?><?php _e('kr'); ?> </span>
  </a>
  <h3>
    Just nu är festivalen <span id="uxu-ticket-status-festival-length"></span> lång. Köp ditt festivalpass nu och förläng festivalen med <u>15 sekunder</u>
  </h3>
</section>
