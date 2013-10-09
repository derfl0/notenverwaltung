<table class="default checkboxActive">
    <caption>
        Notenverwaltung
    </caption>
    <thead>
        <tr>
            <th><?= _('Teilnehmer') ?></th>
            <th><?= _('Bestanden') ?></th>
        </tr>
    </thead>
    <tbody>
        <? foreach ($users as $user): ?>
        <tr><td><?= htmlReady($user->getFullName('full_rev')) ?></td><td><input class="squaredOne" type="checkbox" /></td></tr>
        <? endforeach; ?>  
    </tbody>
    <tfoot>
        <tr>
            <td colspan="2">
                <?= \Studip\Button::create(_('Speichern')) ?>
            </td>
        </tr>
    </tfoot>
</table>

