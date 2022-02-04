@component('mail::message')
# PQRS actualizado

Se ha actualizado tu PQRS

**Observación:** {{ $respuesta }}<br>
**Estado:** {{ $estado }}<br>
**Documento**: <a href="{{config('app.url')}}/storage/pqrs/respuestas/{{ $documento }}">{{ $documento }}</a>

Gracias,<br>
@endcomponent
