@php
// Define your brand colors and common styles here
$color_primary = '#F97316'; // Your brand's orange
$color_secondary = '#10B981'; // A complementary color
$color_text_dark = '#374151';
$color_text_light = '#6B7280';
$color_bg_light = '#F9FAFB';
$color_panel_bg = '#ffffff'; // White for content panels
$color_border = '#e5e7eb'; // gray-200
@endphp

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="x-apple-disable-message-reformatting">
    <title>{{ $title ?? config('app.name') }}</title>

    <style type="text/css">
        /* Base styles */
        /* Base styles */
        body {
            margin: 0;
            padding: 0;
            -webkit-text-size-adjust: 100%;
            background-color: #f2f2f2;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
            color: #374151;
            /* $color_text_dark */
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            padding: 0;
        }

        p {
            margin-top: 0;
            margin-bottom: 15px;
            line-height: 1.6;
        }

        /* Links */
        a {
            color: #F97316;
            /* $color_primary */
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Headings */
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin-top: 0;
            margin-bottom: 10px;
            color: #374151;
            /* $color_text_dark */
        }

        h1 {
            font-size: 28px;
            line-height: 1.2;
        }

        h2 {
            font-size: 22px;
            line-height: 1.3;
        }

        h3 {
            font-size: 18px;
            line-height: 1.4;
        }

        /* Components */
        .wrapper {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            /* $color_panel_bg */
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1),
                0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        .header {
            background-color: #F97316;
            /* $color_primary */
            padding: 20px 0;
            text-align: center;
        }

        .header img {
            max-width: 180px;
            height: auto;
            display: inline-block;
        }

        .content {
            padding: 25px 30px;
            background-color: #ffffff;
            /* $color_panel_bg */
        }

        .footer {
            padding: 20px 30px;
            text-align: center;
            background-color: #F9FAFB;
            /* $color_bg_light */
            border-top: 1px solid #e5e7eb;
            /* $color_border */
        }

        .footer p {
            font-size: 12px;
            line-height: 1.5em;
            color: #6B7280;
            /* $color_text_light */
        }

        .footer a {
            color: #6B7280;
            /* $color_text_light */
            text-decoration: underline;
        }

        /* Panel for sections */
        .panel {
            background-color: #ffffff;
            /* $color_panel_bg */
            border: 1px solid #e5e7eb;
            /* $color_border */
            border-radius: 8px;
            padding: 25px;
            margin-bottom: 25px;
        }

        /* Tables (for order items) */
        .custom-table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
            border: 1px solid #e5e7eb;
            /* $color_border */
            border-radius: 6px;
            overflow: hidden;
        }

        .custom-table th {
            background-color: #F9FAFB;
            /* $color_bg_light */
            color: #374151;
            /* $color_text_dark */
            padding: 12px 18px;
            text-align: left;
            font-size: 14px;
            text-transform: uppercase;
            border-bottom: 1px solid #e5e7eb;
            /* $color_border */
        }

        .custom-table td {
            padding: 12px 18px;
            border-bottom: 1px solid #e5e7eb;
            /* $color_border */
            font-size: 15px;
            line-height: 1.5;
        }

        .custom-table tbody tr:nth-child(even) {
            background-color: #F9FAFB;
            /* $color_bg_light */
        }

        .custom-table tbody tr:last-child td {
            border-bottom: none;
        }

        .custom-table tfoot td {
            padding-top: 15px;
            font-weight: bold;
            font-size: 16px;
            text-align: right;
            border-top: 2px solid #e5e7eb;
            /* $color_border */
        }

        .custom-table tfoot td:first-child {
            text-align: left;
        }

        /* Buttons */
        .button {
            display: inline-block;
            padding: 12px 25px;
            border-radius: 6px;
            text-align: center;
            text-decoration: none;
            font-weight: 600;
            font-size: 16px;
            line-height: 1.25;
            background-color: #F97316;
            /* $color_primary */
            color: #ffffff;
            border: 1px solid #F97316;
            /* $color_primary */
            -webkit-text-size-adjust: none;
        }

        .button:hover {
            background-color: #e66200;
            border-color: #e66200;
            text-decoration: none;
        }

        /* Responsive styles */
        @media only screen and (max-width: 600px) {
            .wrapper {
                width: 100% !important;
                border-radius: 0 !important;
                box-shadow: none !important;
            }

            .content,
            .footer {
                padding: 20px !important;
            }

            .header img {
                max-width: 150px !important;
            }

            .panel {
                border-radius: 0 !important;
            }

            .button {
                width: 100% !important;
                text-align: center !important;
            }
        }
    </style>
</head>

<body>
    <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
        <tr>
            <td align="center">
                <table class="wrapper" width="600" cellpadding="0" cellspacing="0" role="presentation">
                    <tr>
                        <td class="header">
                            <a href="{{ url('/') }}" style="display: inline-block;">
                                <img src="{{ asset('favicon.svg') }}" alt="{{ config('app.name') }}">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="content">
                            {{ $slot }} {{-- This is where your email-specific content will be injected --}}
                        </td>
                    </tr>
                    <tr>
                        <td class="footer">
                            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
                            <p>
                                <a href="{{ url('/') }}">Visit Website</a> |
                                <a href="mailto:support@kamarona.com">Contact Support</a>
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>