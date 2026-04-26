<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Kata Sandi - Pajaken</title>
    <style>
        body { margin: 0; padding: 0; background-color: #f8fafc; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        table { border-spacing: 0; border-collapse: collapse; }
        .main-wrapper { width: 100%; background-color: #f8fafc; padding: 40px 20px; box-sizing: border-box; }
        .content-box { max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 24px; overflow: hidden; box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05); }
        
        /* Kompatibilitas gradient dengan fallback background-color untuk email client lama */
        .header { background-color: #4f46e5; background: linear-gradient(135deg, #4f46e5 0%, #2563eb 100%); padding: 10px 10px; text-align: center; }
        
        .body-wrap { padding: 40px 30px; color: #4b5563; line-height: 1.6; font-size: 16px; }
        .body-wrap h2 { color: #111827; font-size: 24px; font-weight: bold; margin-top: 0; margin-bottom: 20px; }
        
        .info-box { background-color: #eff6ff; border: 1px solid #bfdbfe; border-radius: 16px; padding: 20px; margin-bottom: 20px; margin-top: 10px; }
        .info-box p { margin: 0; color: #1e40af; font-size: 14px; }
        
        .btn { display: inline-block; background-color: #4f46e5; background: linear-gradient(to right, #4f46e5, #2563eb); color: #ffffff !important; font-weight: 500; font-size: 14px; text-decoration: none; padding: 12px 32px; border-radius: 12px; margin: 10px 0 30px 0; box-shadow: 0 4px 6px -1px rgba(79, 70, 229, 0.3); }
        
        .footer { background-color: #f9fafb; padding: 24px 30px; text-align: center; border-top: 1px solid #f3f4f6; }
        .footer p { margin: 0 0 8px 0; color: #9ca3af; font-size: 13px; }
        .link-fallback { font-size: 13px; color: #4f46e5; word-break: break-all; text-decoration: none; }
    </style>
</head>
<body>
    <div class="main-wrapper">
        <table class="content-box" width="100%">
            <!-- Header -->
            <tr>
                <td class="header">
                </td>
            </tr>
            
            <!-- Body Content -->
            <tr>
                <td class="body-wrap">
                    <h2>Halo, {{ $notifiable->name }}!</h2>
                    <p style="margin-bottom: 20px; font-size: 14px;">Anda menerima email ini karena kami menerima permintaan untuk mengatur ulang kata sandi akun Anda di <strong>Pajaken</strong>.</p>

                    <!-- Button -->
                    <table width="100%">
                        <tr>
                            <td align="center">
                                <a href="{{ $url }}" class="btn">Reset Kata Sandi</a>
                            </td>
                        </tr>
                    </table>

                      <!-- Alert Box -->
                    <div class="info-box">
                        <p><strong>Tips Keamanan:</strong> Buatlah kata sandi baru yang kuat, minimal 8 karakter dengan kombinasi huruf besar, huruf kecil, dan angka.</p>
                    </div>

                    <p style="margin-bottom: 10px; font-size: 14px;">Tautan reset kata sandi ini akan kedaluwarsa dalam <strong>60 menit</strong>.</p>
                    <p style="color: #6b7280; margin-bottom: 0; font-size: 14px;">Jika Anda tidak merasa meminta reset kata sandi, abaikan saja email ini. Akun Anda tetap aman bersama kami.</p>
                    
                    <hr style="border: none; border-top: 1px solid #f3f4f6; margin: 32px 0;">
                    
                    <p style="font-size: 13px; color: #9ca3af; margin-bottom: 8px;">Jika Anda kesulitan mengklik tombol "Reset Kata Sandi", salin dan tempel URL di bawah ini ke peramban web Anda:</p>
                    <a href="{{ $url }}" class="link-fallback">{{ $url }}</a>
                </td>
            </tr>
            
            <!-- Footer -->
            <tr>
                <td class="footer">
                    <p>&copy; {{ date('Y') }} Pajaken. Semua hak cipta dilindungi.</p>
                    <p>Email ini dikirim secara otomatis, mohon tidak membalas email ini.</p>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>