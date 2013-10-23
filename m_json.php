<?php

function m_json_type($json) {
    $type = gettype($json);
    switch ($type) {
    case 'array':
        $i = 0;
        foreach ($json as $k => $v) {
            if (!is_int($k) || $k != $i) {
                $type = 'object';
                break;
            }
            $i++;
        }
        break;

    default:
        break;
    }

    return $type;
}

function m_json_encode_help($json, $tab, $delim) {
    $str = '';

    $type =  m_json_type($json);
    switch ($type) {
    case 'string':
        $str = '"' . $json . '"';
        break;

    case 'object':
    case 'array':
        $num = count($json);
        foreach ($json as $k => $v) {
            $str .= $tab;
            if ($type == 'object') {
                $str .= '"' . $k . '":';
            }
            $v_str = m_json_encode_help($v, $tab . "\t", $delim);

            $subtype = m_json_type($v);
            if (isset($delim[$subtype]) && ($d = $delim[$subtype])) {
                $str .= $d[0] . "\n" . $v_str . $tab . $d[1];
            } else {
                $str .= $v_str;
            }

            if (--$num > 0) {
                $str .= ",";
            }
            $str .= "\n";
        }

        break;

    case 'NULL':
        $str = 'null';
        break;

    default:
        $str = $json;
        break;
    }

    return $str;
}

// formated json encode
function m_json_encode($json) {
    $delim = array(
        'object' => array('{', '}'),
        'array'  => array('[', ']')
    );
    $str = '';
    $type =  m_json_type($json);
    switch ($type) {
    case 'object':
    case 'array':
        $str = $delim[$type][0] . "\n";
        $str .= m_json_encode_help($json, "\t", $delim);
        $str .= $delim[$type][1];
        break;

    default:
        $str = m_json_encode_help($json, "\t", $delim);
        break;
    }

    return $str . "\n";
}

?>
