<?php
    /**
     * Adds a stylized component with an active link
     * @param content Text displayed in the component 
     */
    function stylizedComponent($content)
    {
    echo "
        <div style=\"

        font-family: Pikmin;
        text-align: center;

        font-size: 48px;
        letter-spacing: 2px;
        text-shadow: 3px 2px rgba(34,42,53,1);
        color: rgba(255,255,255,1);
        width: 700px;
        margin-left: auto;
        margin-right: auto;\">

            <div style=\"
            background-color: rgba(34,42,53,0.9);
            border:4px solid rgba(0,0,0,1);
            border-radius:40px;
            display:normal;
            \">

                " . $content . "
            </div>

        </div><br>";
    }

    
    /**
     * Adds a stylized component with an active link
     * @param path Path the component is leading to 
     * @param content Text displayed in the component 
     */
    function stylizedComponentWithLink($path, $content)
    {
    echo "
        <div class=\"zoom\" style=\"

        font-family: Pikmin;
        text-align: center;

        font-size: 48px;
        letter-spacing: 2px;
        text-shadow: 3px 2px rgba(34,42,53,1);
        color: rgba(255,255,255,1);
        width: 700px;
        margin-left: auto;
        margin-right: auto;\">

            <a style=\"text-decoration: none;\"
            href=\"" . $path . "\">
                <div style=\"
                background-color: rgba(34,42,53,0.9);
                border:4px solid rgba(0,0,0,1);
                border-radius:40px;
                display:normal;
                \">

                    " . $content . "
                </div>
            </a>

        </div><br>";
    }
?>