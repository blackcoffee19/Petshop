@component('mail::message')
# H20 Petshop {{ $mailData['title'] }}

Reset your account H20 Petshop password

@component('mail::button', ['url' => $mailData['url']])
Create new password
@endcomponent

Thanks, H20
Petshop
@endcomponent