<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoja de Reclamación</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #f8fafc; color: #1e293b;-webkit-font-smoothing: antialiased;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #f8fafc; padding: 20px 10px;">
        <tr>
            <td align="center">
                <!-- Contenedor Principal (Máximo 600px) -->
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 650px; background-color: #ffffff; border-radius: 8px; border: 1px solid #e2e8f0; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.1);">
                    
                    <!-- Encabezado con marca -->
                    <tr>
                        <td align="center" style="background-color: #0f172a; padding: 30px 20px;">
                            <h1 style="color: #ffffff; margin: 0; font-size: 22px; font-weight: 700; letter-spacing: 0.05em;">BET CAPITAL SAC</h1>
                            <p style="color: #f59e0b; margin: 5px 0 0 0; font-size: 14px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.1em;">Libro de Reclamaciones Virtual</p>
                            <div style="display: inline-block; background-color: #f59e0b; color: #0f172a; font-size: 14px; font-weight: 700; padding: 6px 15px; border-radius: 4px; margin-top: 15px;">
                                Hoja N° {{ $claim->claim_number }}
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Cuerpo del Mensaje -->
                    <tr>
                        <td style="padding: 35px 25px;">
                            @if($recipientType === 'admin')
                                <h2 style="font-size: 18px; font-weight: 700; color: #0f172a; margin-top: 0; margin-bottom: 15px;">
                                    Notificación de Registro de Reclamación / Queja
                               </h2>
                               <p style="font-size: 14px; line-height: 1.6; color: #475569; margin-bottom: 25px;">
                                   Se ha registrado un nuevo reclamo o queja a través del Libro de Reclamaciones Virtual de la web. A continuación, se detallan los datos ingresados:
                               </p>
                            @else
                                <h2 style="font-size: 18px; font-weight: 700; color: #0f172a; margin-top: 0; margin-bottom: 15px;">
                                    Estimado(a) {{ $claim->fullname }},
                                </h2>
                                <p style="font-size: 14px; line-height: 1.6; color: #475569; margin-bottom: 25px;">
                                    Confirmamos la recepción de su Hoja de Reclamación Virtual. Adjuntamos el detalle del registro para su constancia. De acuerdo a ley, responderemos en un plazo máximo de quince (15) días hábiles.
                                </p>
                            @endif

                            <!-- Sección 1: Datos del Consumidor -->
                            <h3 style="font-size: 15px; font-weight: 700; color: #0f172a; border-bottom: 2px solid #e2e8f0; padding-bottom: 6px; margin-top: 25px; margin-bottom: 12px; text-transform: uppercase; letter-spacing: 0.05em;">1. Identificación del Consumidor</h3>
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-bottom: 20px; border-collapse: collapse;">
                                <tr>
                                    <td width="35%" style="padding: 8px 12px; border-bottom: 1px solid #f1f5f9; font-size: 13px; font-weight: 700; color: #64748b; background-color: #f8fafc;">Nombre Completo</td>
                                    <td style="padding: 8px 12px; border-bottom: 1px solid #f1f5f9; font-size: 13px; color: #1e293b;">{{ $claim->fullname }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px 12px; border-bottom: 1px solid #f1f5f9; font-size: 13px; font-weight: 700; color: #64748b; background-color: #f8fafc;">Documento de Identidad</td>
                                    <td style="padding: 8px 12px; border-bottom: 1px solid #f1f5f9; font-size: 13px; color: #1e293b;">{{ $claim->document_type }}: {{ $claim->document_number }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px 12px; border-bottom: 1px solid #f1f5f9; font-size: 13px; font-weight: 700; color: #64748b; background-color: #f8fafc;">Domicilio</td>
                                    <td style="padding: 8px 12px; border-bottom: 1px solid #f1f5f9; font-size: 13px; color: #1e293b;">{{ $claim->address }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px 12px; border-bottom: 1px solid #f1f5f9; font-size: 13px; font-weight: 700; color: #64748b; background-color: #f8fafc;">Ubicación</td>
                                    <td style="padding: 8px 12px; border-bottom: 1px solid #f1f5f9; font-size: 13px; color: #1e293b;">{{ $claim->department }} - {{ $claim->province }} - {{ $claim->district }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px 12px; border-bottom: 1px solid #f1f5f9; font-size: 13px; font-weight: 700; color: #64748b; background-color: #f8fafc;">Teléfono / Email</td>
                                    <td style="padding: 8px 12px; border-bottom: 1px solid #f1f5f9; font-size: 13px; color: #1e293b;">{{ $claim->phone }} / <a href="mailto:{{ $claim->email }}" style="color: #0284c7; text-decoration: none;">{{ $claim->email }}</a></td>
                                </tr>
                                @if(!empty($claim->parent_name))
                                <tr>
                                    <td style="padding: 8px 12px; border-bottom: 1px solid #f1f5f9; font-size: 13px; font-weight: 700; color: #64748b; background-color: #f8fafc;">Representante Legal (Menores)</td>
                                    <td style="padding: 8px 12px; border-bottom: 1px solid #f1f5f9; font-size: 13px; color: #1e293b;">{{ $claim->parent_name }}</td>
                                </tr>
                                @endif
                            </table>

                            <!-- Sección 2: Identificación del Bien Contratado -->
                            <h3 style="font-size: 15px; font-weight: 700; color: #0f172a; border-bottom: 2px solid #e2e8f0; padding-bottom: 6px; margin-top: 25px; margin-bottom: 12px; text-transform: uppercase; letter-spacing: 0.05em;">2. Identificación del Bien Contratado</h3>
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-bottom: 20px; border-collapse: collapse;">
                                <tr>
                                    <td width="35%" style="padding: 8px 12px; border-bottom: 1px solid #f1f5f9; font-size: 13px; font-weight: 700; color: #64748b; background-color: #f8fafc;">Tipo de Bien</td>
                                    <td style="padding: 8px 12px; border-bottom: 1px solid #f1f5f9; font-size: 13px; color: #1e293b; text-transform: capitalize;">{{ $claim->item_type }}</td>
                                </tr>
                                @if(!empty($claim->item_amount))
                                <tr>
                                    <td style="padding: 8px 12px; border-bottom: 1px solid #f1f5f9; font-size: 13px; font-weight: 700; color: #64748b; background-color: #f8fafc;">Monto Reclamado</td>
                                    <td style="padding: 8px 12px; border-bottom: 1px solid #f1f5f9; font-size: 13px; color: #1e293b;">S/ {{ number_format($claim->item_amount, 2) }}</td>
                                </tr>
                                @endif
                                <tr>
                                    <td style="padding: 8px 12px; border-bottom: 1px solid #f1f5f9; font-size: 13px; font-weight: 700; color: #64748b; background-color: #f8fafc;">Descripción del Bien</td>
                                    <td style="padding: 8px 12px; border-bottom: 1px solid #f1f5f9; font-size: 13px; color: #1e293b;">{{ $claim->item_description }}</td>
                                </tr>
                            </table>

                            <!-- Sección 3: Detalle de Reclamación -->
                            <h3 style="font-size: 15px; font-weight: 700; color: #0f172a; border-bottom: 2px solid #e2e8f0; padding-bottom: 6px; margin-top: 25px; margin-bottom: 12px; text-transform: uppercase; letter-spacing: 0.05em;">3. Detalle de la Reclamación</h3>
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-bottom: 20px; border-collapse: collapse;">
                                <tr>
                                    <td width="35%" style="padding: 8px 12px; border-bottom: 1px solid #f1f5f9; font-size: 13px; font-weight: 700; color: #64748b; background-color: #f8fafc;">Tipo de Registro</td>
                                    <td style="padding: 8px 12px; border-bottom: 1px solid #f1f5f9; font-size: 13px; color: #1e293b; font-weight: 700; text-transform: uppercase; color: {{ $claim->claim_type === 'reclamacion' ? '#b45309' : '#b91c1c' }};">
                                        {{ $claim->claim_type === 'reclamacion' ? 'Reclamación' : 'Queja' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="padding: 12px; border-bottom: 1px solid #f1f5f9; font-size: 13px; color: #1e293b;">
                                        <strong>Detalles / Hechos:</strong><br>
                                        <p style="margin: 5px 0 0 0; line-height: 1.5; color: #475569; white-space: pre-line;">{{ $claim->claim_details }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="padding: 12px; border-bottom: 1px solid #f1f5f9; font-size: 13px; color: #1e293b;">
                                        <strong>Pedido / Solicitud del Consumidor:</strong><br>
                                        <p style="margin: 5px 0 0 0; line-height: 1.5; color: #475569; white-space: pre-line;">{{ $claim->consumer_request }}</p>
                                    </td>
                                </tr>
                            </table>

                            <div style="background-color: #fffbeb; border-left: 4px solid #f59e0b; padding: 15px; border-radius: 4px; margin-top: 30px;">
                                <p style="margin: 0; font-size: 12px; line-height: 1.5; color: #92400e;">
                                    * <strong>Reclamación:</strong> Disconformidad relacionada a los productos o servicios contratados.<br>
                                    * <strong>Queja:</strong> Disconformidad que no se encuentra relacionada a los productos o servicios, sino al malestar o descontento respecto a la atención al público.
                                </p>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Pie de página -->
                    <tr>
                        <td align="center" style="background-color: #f1f5f9; padding: 20px; font-size: 12px; color: #64748b;">
                            <p style="margin: 0 0 5px 0;">Este es un documento formal emitido por el Libro de Reclamaciones de <strong>BET CAPITAL SAC</strong>.</p>
                            <p style="margin: 0;">&copy; {{ date('Y') }} BET CAPITAL SAC. RUC: 20609382104. Av. Elmer Faucett 1234, Callao, Perú.</p>
                        </td>
                    </tr>
                    
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
