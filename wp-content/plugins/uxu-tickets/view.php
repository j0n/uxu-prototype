<section class="uxu-ticket-status">
  <a class="uxu-ticket-button" href="<?php echo $values['current_ticket_url']; ?>">
    <?php _e('Köp festivalpass nu:'); ?> <?php echo $values['current_ticket_price'] ?><?php _e('kr'); ?>
    <span class="uxu-ticket-left">(<?php echo $values['current_ticket_left'] ?> <?php _e('Festival passes left'); ?>)</span>
  </a>
  <span class="uxu-next-step"><p><?php _e('Nästa pris:'); ?></p><?php echo $values['next_ticket_price']; ?><?php _e('kr'); ?></span>
  <h3><?php _e('Klart jag ska på festivalen och förlänger den med <br ?><u>15 sekunder</u> genom att köpa en biljett.'); ?></h3>
</section>
