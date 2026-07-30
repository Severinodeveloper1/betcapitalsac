<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postulación de Transportista</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #f8fafc; color: #1e293b;-webkit-font-smoothing: antialiased;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #f8fafc; padding: 20px 10px;">
        <tr>
            <td align="center">
                <!-- Contenedor Principal (Máximo 600px) -->
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px; background-color: #ffffff; border-radius: 8px; border: 1px solid #e2e8f0; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.1);">
                    
                    <!-- Encabezado con marca -->
                    <tr>
                        <td align="center" style="background-color: #0f172a; padding: 30px 20px;">
                            <h1 style="color: #ffffff; margin: 0; font-size: 24px; font-weight: 700; letter-spacing: 0.05em;">BET CAPITAL SAC</h1>
                            <p style="color: #10b981; margin: 5px 0 0 0; font-size: 14px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.1em;">Nueva Postulación de Transportista</p>
                        </td>
                    </tr>
                    
                    <!-- Cuerpo del Mensaje -->
                    <tr>
                        <td style="padding: 40px 30px;">
                            <h2 style="font-size: 20px; font-weight: 700; color: #0f172a; margin-top: 0; margin-bottom: 20px;">
                                Registro de Convocatoria Web
                            </h2>
                            <p style="font-size: 15px; line-height: 1.6; color: #475569; margin-bottom: 25px;">
                                Un transportista se ha postulado a través del formulario de convocatoria en el sitio web de BET CAPITAL. A continuación, se detallan sus datos para la evaluación técnica:
                            </p>

                            <!-- Sección Datos del Conductor -->
                            <h3 style="font-size: 16px; font-weight: 700; color: #0f172a; border-bottom: 2px solid #e2e8f0; padding-bottom: 8px; margin-bottom: 15px;">Datos del Conductor</h3>
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-bottom: 25px; border-collapse: collapse;">
                                <tr>
                                    <td width="35%" style="padding: 10px 15px; border-bottom: 1px solid #f1f5f9; font-size: 14px; font-weight: 700; color: #64748b; background-color: #f8fafc;">Nombre del Conductor</td>
                                    <td style="padding: 10px 15px; border-bottom: 1px solid #f1f5f9; font-size: 14px; color: #1e293b;">{{ $applicationData['driver_name'] }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px 15px; border-bottom: 1px solid #f1f5f9; font-size: 14px; font-weight: 700; color: #64748b; background-color: #f8fafc;">Teléfono / Celular</td>
                                    <td style="padding: 10px 15px; border-bottom: 1px solid #f1f5f9; font-size: 14px; color: #1e293b;">{{ $applicationData['phone'] }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px 15px; border-bottom: 1px solid #f1f5f9; font-size: 14px; font-weight: 700; color: #64748b; background-color: #f8fafc;">Documento de Identidad</td>
                                    <td style="padding: 10px 15px; border-bottom: 1px solid #f1f5f9; font-size: 14px; color: #1e293b;">{{ $applicationData['document_type'] }}: {{ $applicationData['document_number'] }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px 15px; border-bottom: 1px solid #f1f5f9; font-size: 14px; font-weight: 700; color: #64748b; background-color: #f8fafc;">Nº Licencia de Conducir</td>
                                    <td style="padding: 10px 15px; border-bottom: 1px solid #f1f5f9; font-size: 14px; color: #1e293b;">{{ $applicationData['license_number'] }}</td>
                                </tr>
                            </table>

                            <!-- Sección Datos del Vehículo -->
                            <h3 style="font-size: 16px; font-weight: 700; color: #0f172a; border-bottom: 2px solid #e2e8f0; padding-bottom: 8px; margin-bottom: 15px;">Datos de la Unidad</h3>
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-bottom: 30px; border-collapse: collapse;">
                                <tr>
                                    <td width="35%" style="padding: 10px 15px; border-bottom: 1px solid #f1f5f9; font-size: 14px; font-weight: 700; color: #64748b; background-color: #f8fafc;">Tipo de Vehículo</td>
                                    <td style="padding: 10px 15px; border-bottom: 1px solid #f1f5f9; font-size: 14px; color: #1e293b;">{{ $applicationData['vehicle_type'] }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px 15px; border-bottom: 1px solid #f1f5f9; font-size: 14px; font-weight: 700; color: #64748b; background-color: #f8fafc;">Placa del Vehículo</td>
                                    <td style="padding: 10px 15px; border-bottom: 1px solid #f1f5f9; font-size: 14px; color: #1e293b;">{{ $applicationData['vehicle_plate'] }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px 15px; border-bottom: 1px solid #f1f5f9; font-size: 14px; font-weight: 700; color: #64748b; background-color: #f8fafc;">Año de Fabricación</td>
                                    <td style="padding: 10px 15px; border-bottom: 1px solid #f1f5f9; font-size: 14px; color: #1e293b;">{{ $applicationData['vehicle_year'] }}</td>
                                </tr>
                            </table>

                            <div style="background-color: #ecfdf5; border-left: 4px solid #10b981; padding: 15px; border-radius: 4px;">
                                <p style="margin: 0; font-size: 13px; color: #065f46; font-weight: 600;">
                                    * Esta información ha sido guardada en la base de datos de administración y se encuentra lista para su aprobación o rechazo en la plataforma.
                                </p>
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
