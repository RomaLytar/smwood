<section class="contact">
  <div class="wrap">
    <h2 class="title">Контакты</h2>
    <ul class="contact__list">
      <li class="contact__item">
        <h3 class="contact__item-name">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 578.106 578.106" width="20" height="20" fill="#333333">
            <path  d="M577.83,456.128c1.225,9.385-1.635,17.545-8.568,24.48l-81.396,80.781
              c-3.672,4.08-8.465,7.551-14.381,10.404c-5.916,2.857-11.729,4.693-17.439,5.508c-0.408,0-1.635,0.105-3.676,0.309
              c-2.037,0.203-4.689,0.307-7.953,0.307c-7.754,0-20.301-1.326-37.641-3.979s-38.555-9.182-63.645-19.584
              c-25.096-10.404-53.553-26.012-85.376-46.818c-31.823-20.805-65.688-49.367-101.592-85.68
              c-28.56-28.152-52.224-55.08-70.992-80.783c-18.768-25.705-33.864-49.471-45.288-71.299
              c-11.425-21.828-19.993-41.616-25.705-59.364S4.59,177.362,2.55,164.51s-2.856-22.95-2.448-30.294
              c0.408-7.344,0.612-11.424,0.612-12.24c0.816-5.712,2.652-11.526,5.508-17.442s6.324-10.71,10.404-14.382L98.022,8.756
              c5.712-5.712,12.24-8.568,19.584-8.568c5.304,0,9.996,1.53,14.076,4.59s7.548,6.834,10.404,11.322l65.484,124.236
              c3.672,6.528,4.692,13.668,3.06,21.42c-1.632,7.752-5.1,14.28-10.404,19.584l-29.988,29.988c-0.816,0.816-1.53,2.142-2.142,3.978
              s-0.918,3.366-0.918,4.59c1.632,8.568,5.304,18.36,11.016,29.376c4.896,9.792,12.444,21.726,22.644,35.802
              s24.684,30.293,43.452,48.653c18.36,18.77,34.68,33.354,48.96,43.76c14.277,10.4,26.215,18.053,35.803,22.949
              c9.588,4.896,16.932,7.854,22.031,8.871l7.648,1.531c0.816,0,2.145-0.307,3.979-0.918c1.836-0.613,3.162-1.326,3.979-2.143
              l34.883-35.496c7.348-6.527,15.912-9.791,25.705-9.791c6.938,0,12.443,1.223,16.523,3.672h0.611l118.115,69.768
              C571.098,441.238,576.197,447.968,577.83,456.128z"/>
          </svg>
          Телефон
        </h3>
        <ul class="contact__item-list">
          <li>
            <a href="tel:+<?php echo get_option('my_phone_first_mob') ?>"><?php echo get_option('my_phone_first') ?></a>
          </li>
          <li>
            <a href="tel:+<?php echo get_option('my_phone_second_mob') ?>"><?php echo get_option('my_phone_second') ?></a>
          </li>
        </ul>
      </li>
      <li class="contact__item">
        <h3 class="contact__item-name">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14" width="20" height="20" fill="#333333">
            <path d="M7,9L5.268,7.484l-4.952,4.245C0.496,11.896,0.739,12,1.007,12h11.986
              c0.267,0,0.509-0.104,0.688-0.271L8.732,7.484L7,9z"/>
            <path d="M13.684,2.271C13.504,2.103,13.262,2,12.993,2H1.007C0.74,2,0.498,2.104,0.318,2.273L7,8
              L13.684,2.271z"/>
            <polygon points="0,2.878 0,11.186 4.833,7.079"/>
            <polygon points="9.167,7.079 14,11.186 14,2.875"/>
          </svg>
          E-mail
        </h3>
        <ul class="contact__item-list">
          <li>
            <a href="mailto:smartwood@gmail.com"><?php echo $admin_email = get_option('admin_email'); ?></a>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</section>