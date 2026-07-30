<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notificación de Mensaje</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #f8fafc; color: #1e293b;-webkit-font-smoothing: antialiased;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #f8fafc; padding: 20px 10px;">
        <tr>
            <td align="center">
                <!-- Contenedor Principal (Máximo 600px) -->
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px; background-color: #ffffff; border-radius: 8px; border: 1px border #e2e8f0; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.1);">
                    
                    <!-- Encabezado con marca -->
                    <tr>
                        <td align="center" style="background-color: #0f172a; padding: 30px 20px;">
                            <h1 style="color: #ffffff; margin: 0; font-size: 24px; font-weight: 700; letter-spacing: 0.05em;">BET CAPITAL SAC</h1>
                            @if($messageData['type'] === 'accounting')
                                <p style="color: #38bdf8; margin: 5px 0 0 0; font-size: 14px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.1em;">Soporte Contable y Tributario</p>
                            @else
                                <p style="color: #94a3b8; margin: 5px 0 0 0; font-size: 14px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.1em;">Consulta de Contacto General</p>
                            @endif
                        </td>
                    </tr>
                    
                    <!-- Cuerpo del Mensaje -->
                    <tr>
                        <td style="padding: 40px 30px;">
                            <h2 style="font-size: 20px; font-weight: 700; color: #0f172a; margin-top: 0; margin-bottom: 20px;">
                                @if($messageData['type'] === 'accounting')
                                    Nueva Solicitud de Soporte Contable
                                @else
                                    Nuevo Mensaje Recibido de la Web
                                @endif
                            </h2>
                            <p style="font-size: 15px; line-height: 1.6; color: #475569; margin-bottom: 25px;">
                                Se ha registrado un nuevo mensaje a través del formulario de la página web. A continuación, se detallan los datos del remitente:
                            </p>

                            <!-- Tabla de Detalles -->
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-bottom: 30px; border-collapse: collapse;">
                                <tr>
                                    <td width="35%" style="padding: 10px 15px; border-bottom: 1px solid #f1f5f9; font-size: 14px; font-weight: 700; color: #64748b; background-color: #f8fafc;">Nombre Completo</td>
                                    <td style="padding: 10px 15px; border-bottom: 1px solid #f1f5f9; font-size: 14px; color: #1e293b;">{{ $messageData['name'] }}</td>
                                </tr>
                                @if(!empty($messageData['company']))
                                <tr>
                                    <td style="padding: 10px 15px; border-bottom: 1px solid #f1f5f9; font-size: 14px; font-weight: 700; color: #64748b; background-color: #f8fafc;">Empresa / Razón Social</td>
                                    <td style="padding: 10px 15px; border-bottom: 1px solid #f1f5f9; font-size: 14px; color: #1e293b;">{{ $messageData['company'] }}</td>
                                </tr>
                                @endif
                                <tr>
                                    <td style="padding: 10px 15px; border-bottom: 1px solid #f1f5f9; font-size: 14px; font-weight: 700; color: #64748b; background-color: #f8fafc;">Correo Electrónico</td>
                                    <td style="padding: 10px 15px; border-bottom: 1px solid #f1f5f9; font-size: 14px; color: #1e293b;"><a href="mailto:{{ $messageData['email'] }}" style="color: #0284c7; text-decoration: none;">{{ $messageData['email'] }}</a></td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px 15px; border-bottom: 1px solid #f1f5f9; font-size: 14px; font-weight: 700; color: #64748b; background-color: #f8fafc;">Teléfono / Celular</td>
                                    <td style="padding: 10px 15px; border-bottom: 1px solid #f1f5f9; font-size: 14px; color: #1e293b;">{{ $messageData['phone'] }}</td>
                                </tr>
                            </table>

                            <!-- Mensaje / Detalle de la Consulta -->
                            <div style="background-color: #f8fafc; border-left: 4px solid #0284c7; padding: 20px; border-radius: 4px;">
                                <h3 style="margin-top: 0; margin-bottom: 10px; font-size: 14px; font-weight: 700; text-transform: uppercase; color: #64748b; letter-spacing: 0.05em;">Detalle del Mensaje:</h3>
                                <p style="margin: 0; font-size: 14px; line-height: 1.6; color: #334155; white-space: pre-line;">{{ $messageData['message'] }}</p>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Pie de página -->
                    <tr>
                        <td align="center" style="background-color: #f1f5f9; padding: 20px; font-size: 12px; color: #64748b;">
                            <p style="margin: 0 0 5px 0;">Este es un mensaje automático generado por el sitio web de <strong>BET CAPITAL SAC</strong>.</p>
                            <p style="margin: 0;">&copy; {{ date('Y') }} BET CAPITAL SAC. Todos los derechos reservados.</p>
                        </td>
                    </tr>
                    
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
