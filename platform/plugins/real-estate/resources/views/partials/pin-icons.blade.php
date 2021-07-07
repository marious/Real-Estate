@if ($pinIcons)
    @foreach($pinIcons as $icon)
    <label>
        <input type="radio" name="pin_icon" value="{{ $icon->getFileName() }}" style="width: 60px;" {{ str_replace('_', '-', $item->pin_icon) == $icon->getFileName() ? 'checked' : ''}}>
        <img src="/storage/pin-icons/{{ $icon->getFIleName() }}" alt="" width="40" height="40">
    </label>
    @endforeach

</select>
@endif
