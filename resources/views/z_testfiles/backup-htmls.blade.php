<div class="data-label">Reference Aerodome/Facility</div>
<div class="data-value">
    <div class="dropdown">
        <select class="dropbtn" name="reference_aerodrome" id="selectedAirport">
            <option value="" disabled selected>Select an Airport</option>
            @foreach ($airports as $airport)
            <option value="{{ $airport }}">{{ $airport }}</option>
            @endforeach
        </select>
    </div>

</div>

