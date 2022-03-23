<div class="login-wrapper">
  <h1 class="center logintitle">Login</h1>
  <div class="container">
    <form class="loginform" method="post">
      <div class="form-outline mb-4">
        <input required autofocus placeholder="username@email.com" type="email" name="email" id="email" class="form-control" />
      </div>
      <div class="form-outline mb-4">
        <input placeholder="your secret password" type="password" name="password" id="password" class="form-control" />
      </div>
      <div class="row mb-4">
        <div class="col d-flex justify-content-center">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="cookie" checked />
            <label class="form-check-label" for="cookie"> Remember me </label>
          </div>
        </div>
        <div class="col">
          <a href="<?= BASE_URL ?>forgotpassword">Forgot password?</a>
        </div>
      </div>
      <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
      <div class="alternativeauth">
        <p>Not a member? <a href="<?= BASE_URL ?>register">Register</a></p>
        <p class="alternativeauth__title">or sign up with:</p>
        <button type="button" class="btn btn-link btn-floating mx-1">
          <svg class="alternativeauth__icon" id="vk" viewBox="0 0 511.962 511.962">
            <path d="M507.399,370.471c-1.376-2.304-9.888-20.8-50.848-58.816c-42.88-39.808-37.12-33.344,14.528-102.176 c31.456-41.92,44.032-67.52,40.096-78.464c-3.744-10.432-26.88-7.68-26.88-7.68l-76.928,0.448c0,0-5.696-0.768-9.952,1.76
                    c-4.128,2.496-6.784,8.256-6.784,8.256s-12.192,32.448-28.448,60.032c-34.272,58.208-48,61.28-53.6,57.664
                    c-13.024-8.416-9.76-33.856-9.76-51.904c0-56.416,8.544-79.936-16.672-86.016c-8.384-2.016-14.528-3.36-35.936-3.584
                    c-27.456-0.288-50.72,0.096-63.872,6.528c-8.768,4.288-15.52,13.856-11.392,14.4c5.088,0.672,16.608,3.104,22.72,11.424
                    c7.904,10.72,7.616,34.848,7.616,34.848s4.544,66.4-10.592,74.656c-10.4,5.664-24.64-5.888-55.2-58.72 c-15.648-27.04-27.488-56.96-27.488-56.96s-2.272-5.568-6.336-8.544c-4.928-3.616-11.84-4.768-11.84-4.768l-73.152,0.448
                    c0,0-10.976,0.32-15.008,5.088c-3.584,4.256-0.288,13.024-0.288,13.024s57.28,133.984,122.112,201.536
                    c59.488,61.92,127.008,57.856,127.008,57.856h30.592c0,0,9.248-1.024,13.952-6.112c4.352-4.672,4.192-13.44,4.192-13.44
                    s-0.608-41.056,18.464-47.104c18.784-5.952,42.912,39.68,68.48,57.248c19.328,13.28,34.016,10.368,34.016,10.368l68.384-0.96
                    C488.583,400.807,524.359,398.599,507.399,370.471z">
            </path>
          </svg>
        </button>
        <button type="button" class="btn btn-link btn-floating mx-1">
          <svg class="alternativeauth__icon" id="telegram" viewBox="0 0 24 24">
            <path d="m9.417 15.181-.397 5.584c.568 0 .814-.244 1.109-.537l2.663-2.545 5.518 4.041c1.012.564 1.725.267 1.998-.931l3.622-16.972.001-.001c.321-1.496-.541-2.081-1.527-1.714l-21.29 8.151c-1.453.564-1.431 1.374-.247 1.741l5.443 1.693 12.643-7.911c.595-.394 1.136-.176.691.218z" />
          </svg>
        </button>
        <button type="button" class="btn btn-link btn-floating mx-1">
          <svg class="alternativeauth__icon" id="fb" viewBox="0 0 167.657 167.657">
            <path d="M83.829,0.349C37.532,0.349,0,37.881,0,84.178c0,41.523,30.222,75.911,69.848,82.57v-65.081H49.626 v-23.42h20.222V60.978c0-20.037,12.238-30.956,30.115-30.956c8.562,0,15.92,0.638,18.056,0.919v20.944l-12.399,0.006 c-9.72,0-11.594,4.618-11.594,11.397v14.947h23.193l-3.025,23.42H94.026v65.653c41.476-5.048,73.631-40.312,73.631-83.154 C167.657,37.881,130.125,0.349,83.829,0.349z">
            </path>
          </svg>
        </button>
        <button type="button" class="btn btn-link btn-floating mx-1">
          <svg class="alternativeauth__icon" id="linkedin" viewBox="0 0 512 512">
            <rect y="160" width="114.496" height="352" />
            <path d="M426.368,164.128c-1.216-0.384-2.368-0.8-3.648-1.152c-1.536-0.352-3.072-0.64-4.64-0.896 c-6.08-1.216-12.736-2.08-20.544-2.08c-66.752,0-109.088,48.544-123.04,67.296V160H160v352h114.496V320 c0,0,86.528-120.512,123.04-32c0,79.008,0,224,0,224H512V274.464C512,221.28,475.552,176.96,426.368,164.128z" />
            <circle cx="56" cy="56" r="56" />
          </svg>
        </button>
      </div>
    </form>
    <? if (isset($_SESSION['notification'])) : ?>
      <div class="alert <?= $_SESSION['notification']['class'] ?> center fit">
        <?= $_SESSION['notification']['text'] ?>
      </div>
    <? $_SESSION['notification'] = null;
    endif; ?>
  </div>
