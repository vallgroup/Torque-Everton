<?php
/**
 * Template file for displaying Contact Form
 */

if (
  isset( $_POST['tq_contact_form'] )
  && class_exists('Everton_Lead_CPT')
) {
  // form was submitted
  try {
    if ( Everton_Lead_CPT::validate_data_for_api( $_POST ) ) {
      throw new Exception('Please ensure all required fields are filled and the data is entered correctly.');
    }

    if (
      ! isset($_POST['_wpnonce']) ||
      ! wp_verify_nonce( $_POST['_wpnonce'], 'submit_contact_form' )
    ) {
      // couldnt verify nonce
      throw new Exception('Form validation failed. Please reload the page and try again.');
    }

    // form is validated, lets;
    //  1) send the lead to rentcafe's lead API endpoint
    //  2) save lead into CPT
    //  3) TODO: send admin notification?

    // send lead
    $lead_sent = Everton_Lead_CPT::send_lead( $_POST );
    $_POST['response_status'] = $lead_sent;

    // save lead
    $lead_id = Everton_Lead_CPT::save_lead( $_POST );
    if ( ! $lead_id ) {
      // TODO: send email to admin?
      // $message = array(
      //   'success' => true,
      //   'message' => 'Thank you for your enquiry. We\'ll be in touch shortly.'
      // );
    } else {
      $message = array(
        'success' => true,
        'message' => 'Thank you for your enquiry. We\'ll be in touch shortly.'
      );
    }

    // // send admin email notification
    // $notification_email = get_field( 'notification_email' );
    // $email_result = Interra_Job_Application_CPT::send_admin_notification( $lead_id, $notification_email, $_POST );

    // // Check email was sent correctly...
    // if ( ! $email_result ) {
    //   $admin_email = ( $notification_email != '' ? $notification_email : get_option( 'admin_email' ) );
    //   throw new Exception('Your application has been successfully submitted, but the admin notification has failed to send. Please contact us directly via: <a href="mailto:' . $admin_email .'">' . $admin_email . '</a>. Sorry for any inconvenience this causes.' );
    // }

  } catch (Exception $e) {
    $message = array(
      'success' => false,
      'message' => $e->getMessage() !== '' ? $e->getMessage() : 'We\'ve experienced an error whilst saving your enquiry. Please reload this page and try again.'
    );
  }
}

?>

<section class="tq-contact-form">
  <div class="contact-form-wrapper">
    <div class="contact-form-col-left">
      <?php get_template_part( 'parts/shared/contact-parts/email' ); ?>
      <?php get_template_part( 'parts/shared/contact-parts/phone' ); ?>
      <?php get_template_part( 'parts/shared/contact-parts/address' ); ?>
    </div>
    
    <div class="contact-form-col-right">

      <?php if ( isset( $response_status ) ) {
        echo $response_status;
      } ?>

      <?php if ( isset( $message ) ) {
        $success_class = ! $message['success'] ? 'error' : '';
        ?>
        <div class="form-message <?php echo $success_class; ?>">
          <?php echo $message['message']; ?>
        </div>
      <?php } ?>

      <form class="contact-form" method="post" action="#contact-form" enctype="multipart/form-data">
        <?php echo wp_nonce_field( 'submit_contact_form' ); ?>
        <input type="hidden" name="tq_contact_form" />
        <input type="text" name="first_name" placeholder="First Name*" maxlength="2" required />
        <input type="text" name="last_name" placeholder="Last Name*" maxlength="40" required />
        <input type="email" name="email" placeholder="Email*" maxlength="80" required />
        <input type="text" name="phone" placeholder="Phone*" maxlength="17" required />
        <input type="text" name="address_1" placeholder="Address 1*" maxlength="40" required />
        <input type="text" name="address_2" placeholder="Address 2" maxlength="40" />
        <input type="text" name="city" placeholder="City*" maxlength="40" required />
        <input type="text" name="state" placeholder="State*" maxlength="4" required />
        <input type="text" name="zip_code" placeholder="Zip Code*" maxlength="12" required />
        <textarea name="message" placeholder="Message" rows="6" maxlength="255"></textarea>
        <?php // echo do_shortcode('[torque_recaptcha]'); ?>
        <input class="btn-primary wide" type="submit" />
      </form>
    </div>
  </div>
</section>