<div style="max-width: 800px; margin: 40px auto;">
    <h1>Contactos Registrados</h1>

    <table style="width: 100%; border-collapse: collapse;" border="1">
        <thead>
            <tr>
                <th style="padding: 8px;">Nombre</th>
                <th style="padding: 8px;">Teléfono</th>
                <th style="padding: 8px;">Objetivo</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($contactos as $contacto)
                <tr>
                    <td style="padding: 8px;">{{ $contacto->nombre }}</td>
                    <td style="padding: 8px;">{{ $contacto->telefono }}</td>
                    <td style="padding: 8px;">{{ $contacto->objetivo }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" style="text-align:center; padding:10px;">
                        No hay contactos registrados.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

