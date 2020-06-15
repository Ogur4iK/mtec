@if(!$menuitems->isEmpty())
    <div>
        <nav class="hdr__menu-wrap">
            <ul class="hdr__menu">
                @php
                    function buildMenu($items)
                    {
                        foreach($items as $item)
                        {
                @endphp
                @if($item->hasChildren())
                    <li class="hdr__menu-item">
                        <a
                            @if($item->url != null)
                                href="{{ $item->url }}"
                            @endif
                            class="<?= $item->hasParent() ? 'sub__menu-link' : 'hdr__menu-link'?>">{{ $item->name }}</a>
                        <ul class="sub__menu">
                            @php buildMenu($item->children) @endphp
                        </ul>
                    </li>
                @else
                    <li class="hdr__menu-item">
                        <a
                            @if($item->url != null)
                                href="{{ $item->url }}"
                            @endif
                            class="<?= $item->hasParent() ? 'sub__menu-link' : 'hdr__menu-link'?>">{{ $item->name }}</a>
                    </li>
                @endif
                @php
                    }
                  }
                  buildMenu($menuitems);
                @endphp
            </ul>
        </nav>
        <button class="menu__burger"></button>
        <div class="hdr__menu-close"></div>
        <div class="menu__overlay"></div>
    </div>
@endif



