<section class="uxu-ticket-status">
  <div class="uxu-ticket-status-full">
    <h3>
      Just nu är festivalen <span class="uxu-ticket-status-festival-length"></span> lång. Köp ditt festivalpass nu och förläng festivalen med <u>15 sekunder</u>
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
    <span class="uxu-ticket-status-minimize">x</span>
  </div>
  <div class="uxu-ticket-status-mini">
      <span class="uxu-mini-length">
        Just nu är festivalen <span class="uxu-ticket-status-festival-length"></span> lång.
      </span>
      <a class="uxu-ticket-mini-button" href="<?php echo $values['current_ticket_url']; ?>">
        <?php _e('Köp festivalpass'); ?> <span class="uxu-ticket-left"><?php echo $values['current_ticket_price'] ?><?php _e('kr'); ?> </span>
      </a>
  </div>
</section>
