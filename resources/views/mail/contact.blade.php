<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Nouveau message de contact</title>
  <style>
    body { margin: 0; padding: 0; background: #f4f6f9; font-family: Arial, sans-serif; }
    .wrapper { max-width: 600px; margin: 40px auto; background: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,.08); }
    .header { background: #29ABE2; padding: 28px 32px; }
    .header img { height: 48px; object-fit: contain; }
    .header h1 { color: #fff; font-size: 20px; margin: 12px 0 0; }
    .body { padding: 32px; }
    .field { margin-bottom: 20px; }
    .field-label { font-size: 11px; font-weight: 700; text-transform: uppercase; color: #29ABE2; letter-spacing: .8px; margin-bottom: 4px; }
    .field-value { font-size: 15px; color: #333; line-height: 1.6; }
    .message-box { background: #f4f6f9; border-left: 4px solid #29ABE2; border-radius: 4px; padding: 16px; margin-top: 4px; white-space: pre-line; }
    .divider { border: none; border-top: 1px solid #eee; margin: 24px 0; }
    .footer { background: #f4f6f9; padding: 16px 32px; text-align: center; font-size: 12px; color: #999; }
  </style>
</head>
<body>
  <div class="wrapper">
    <div class="header">
      <h1>Nouveau message de contact</h1>
    </div>
    <div class="body">

      <div class="field">
        <div class="field-label">Nom complet</div>
        <div class="field-value">{{ $nom }}</div>
      </div>

      <div class="field">
        <div class="field-label">Email</div>
        <div class="field-value"><a href="mailto:{{ $emailClient }}" style="color:#29ABE2;">{{ $emailClient }}</a></div>
      </div>

      @if($telephone)
      <div class="field">
        <div class="field-label">Téléphone</div>
        <div class="field-value">{{ $telephone }}</div>
      </div>
      @endif

      @if($service)
      <div class="field">
        <div class="field-label">Service concerné</div>
        <div class="field-value">{{ $service }}</div>
      </div>
      @endif

      <hr class="divider" />

      <div class="field">
        <div class="field-label">Message</div>
        <div class="field-value message-box">{{ $corps }}</div>
      </div>

    </div>
    <div class="footer">
      KizNet Service — Pointe-Noire, Congo Brazzaville
    </div>
  </div>
</body>
</html>
