<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Beispielformular</title>
    </head>
    <body>
        <h1>Beispielformular</h1>

        {form method="post"}
            <table>
                <tr>
                    <th>Vorname:</th>
                    <td>
                        <input type="text" name="firstname" value="">
                    </td>
                </tr>
                <tr>
                    <th>Nachname:</th>
                    <td>
                        <input type="text" name="lastname" value="">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" name="saveBtn">Speichern</button>
                    </td>
                </tr>
            </table>
        {/form}
    </body>
</html>
