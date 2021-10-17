
/**
 * Get some apitoken if not asigned
 */

private function apiTkn($api_token)
{
    if ($api_token === null || trim($api_token) === '') {
        global $controllerSelect;
        $api_token = $controllerSelect->apiTokenUser(true);
    }
    return $api_token;
}

/**
 * Ajax functions
 */
public function get($data, $route, $api_token = null)
{
    $api_token = $this->apiTkn($api_token);

    $params = '';
    foreach (json_decode($data) as $key => $val) {
        if (trim($params) === '') {
            $params .= '?';
        } else {
            $params .= '&';
        }
        $params .= $key . '=' . urlencode($val);
    }

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => CCV_ROUTE_API . $route . $params,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        //CURLOPT_POSTFIELDS => $data,
        CURLOPT_HTTPHEADER => array(
            'Accept: application/json',
            'Authorization: Bearer ' . $api_token,
            //'Content-Type: application/json'
        ),
    ));
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    //curl_setopt($curl, CURLOPT_VERBOSE, true);

    $response = curl_exec($curl);

    //if ($response === false) {
    //    printf("cUrl error (#%d): %s<br>\n", curl_errno($curl),
    //           htmlspecialchars(curl_error($curl)));
    //}
    //var_dump(curl_errno($curl));

    curl_close($curl);
    return json_decode($response);
}

public function post($data, $route, $api_token = null)
{

    $api_token = $this->apiTkn($api_token);

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => CCV_ROUTE_API . $route,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $data,
        CURLOPT_HTTPHEADER => array(
            'Accept: application/json',
            'Authorization: Bearer ' . $api_token,
            'Content-Type: application/json'
        ),
    ));
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    //curl_setopt($curl, CURLOPT_VERBOSE, true);

    $response = curl_exec($curl);

    //if ($response === false) {
    //    printf("cUrl error (#%d): %s<br>\n", curl_errno($curl),
    //           htmlspecialchars(curl_error($curl)));
    //}
    //var_dump(curl_errno($curl));

    curl_close($curl);
    return json_decode($response);

}

public function put($data, $route, $api_token = null)
{
    $api_token = $this->apiTkn($api_token);

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => CCV_ROUTE_API . $route,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_POSTFIELDS => $data,
        CURLOPT_HTTPHEADER => array(
            'Accept: application/json',
            'Authorization: Bearer ' . $api_token,
            'Content-Type: application/json'
        ),
    ));
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    //curl_setopt($curl, CURLOPT_VERBOSE, true);

    $response = curl_exec($curl);

    //if ($response === false) {
    //    printf("cUrl error (#%d): %s<br>\n", curl_errno($curl),
    //           htmlspecialchars(curl_error($curl)));
    //}
    //var_dump(curl_errno($curl));

    curl_close($curl);
    return json_decode($response);
}

public function delete($data, $route, $api_token = null)
{
    $api_token = $this->apiTkn($api_token);

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => CCV_ROUTE_API . $route,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'DELETE',
        CURLOPT_POSTFIELDS => $data,
        CURLOPT_HTTPHEADER => array(
            'Accept: application/json',
            'Authorization: Bearer ' . $api_token,
            'Content-Type: application/json'
        ),
    ));
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    //curl_setopt($curl, CURLOPT_VERBOSE, true);

    $response = curl_exec($curl);

    //if ($response === false) {
    //    printf("cUrl error (#%d): %s<br>\n", curl_errno($curl),
    //           htmlspecialchars(curl_error($curl)));
    //}
    //var_dump(curl_errno($curl));

    curl_close($curl);
    return json_decode($response);
}

/**
 * Custom functions
 */

public function insertUser($data)
{
    $json = json_encode([
        "ref" => $data["ref"],
        "nombre" => $data["nombre"],
        "apellido" => $data["apellido"],
        "email" => $data["correo"],
        "empresa" => $data["empresa"],
        "tipo" => $data["departamento"],
        "password" => $data["contrasenia"],
    ]);
    $result = $this->post($json, 'user', $_SESSION['api_token']);

    if (isset($result->errors) && !empty($result->errors)) {
        return [
            'no' => '10000',
            'type' => 'error',
            'message' => $result->message,
            'errors' => $result->errors
        ];
    }

    $auth = $this->auth($data);
    if (is_array($auth) && isset($auth['no']) && $auth['no'] === '10000') {
        return $auth;
    }

    global $controllerFirebird;
    global $controllerInsert;
    global $ajax;

    $auth = json_decode(json_encode($auth), true);
    $reg = $auth["response"];

    $seller = $controllerFirebird->usuarioSAE($reg["complete_name"]);
    $r = $ajax->updateSaeUserSeller($seller, $reg);

    $controllerInsert->sincronizarUsuario($reg, $r);

    return [
        'no' => '10001',
        'type' => 'success',
        'message' => $result->message,
    ];
}

/**
 * Login in ccv
 */
public function auth($data)
{
    $json = json_encode([
        "email" => $data["correo"],
        "password" => $data["contrasenia"],
    ]);
    $result = $this->post($json, 'users/auth', $_SESSION['api_token']);

    if (isset($result->errors) && !empty($result->errors)) {
        return [
            'no' => '10000',
            'type' => 'error',
            'message' => $result->message,
            'errors' => $result->errors
        ];
    }

    return $result;
}

/**
 * Get data of products in coincitymexico.com
 */
public function getProductsMV($search = null, $page = 1)
{
    $json = json_encode([
        "q" => $search,
        "page" => $page
    ]);
    $r = [];

    $result = $this->get($json, 'products/get/mv', $_SESSION['api_token']);
    if (isset($result->errors) && !empty($result->errors)) {
        return [
            'no' => '10000',
            'type' => 'error',
            'message' => $result->message,
            'errors' => $result->errors
        ];
    }
    if (isset($result->response->next_page_url) && $result->response->next_page_url !== null) {
        $result->page = intval($result->response->current_page) + 1;
        $result->completed = false;
    } else {
        $result->page = 0;
        $result->completed = true;
    }
    $r[] = $result;

    /*
    if(isset($result->response->next_page_url) && $result->response->next_page_url !== null){
        for($i = 2;$i<=$result->response->last_page;$i++){
            $json = json_encode([
                "q" => $search,
                "page" => $i,
            ]);
            $res = $this->get($json,'products/get/mv',$_SESSION['api_token']);
            if(isset($res->errors) && !empty($res->errors)){
                return [
                    'no' => '10000',
                    'type' => 'error',
                    'message' => $res->message,
                    'errors' => $res->errors
                ];
            }
            $r[] = $res;
        }
    }
    */
    return $r;
}

/**
 * Sincroniza los stock de los productos con la pagina de coin
 * (solo los que estan conectados a SAE y ccv)
 */
public function sendProdsStockSync()
{
    global $controllerSelect;
    $products = $controllerSelect->getStockSyncProducts();
    //   echo json_encode($products);die();
    if (!empty($products)) {
        $json = json_encode($products);
        $result = $this->put($json, 'products/sync/stock', $_SESSION['api_token']);

        if (isset($result->errors) && !empty($result->errors)) {
            return [
                'no' => '10000',
                'type' => 'error',
                'message' => $result->message,
                'errors' => $result->errors
            ];
        }

        return $result;
    }
    return [
        'no' => '10000',
        'type' => 'error',
        'message' => 'Sin productos para actualizar',
        'errors' => 'sin productos'
    ];
}


public function getKeysForCrypt()
{
    $json = json_encode([]);
    $result = $this->get($json, 'cripto', $_SESSION['api_token']);

    if (isset($result->errors) && !empty($result->errors)) {
        return [
            'no' => '10000',
            'type' => 'error',
            'message' => $result->message,
            'errors' => $result->errors
        ];
    }

    return $result;
}


public function getKeyDecrypt($uuid)
{
    $json = json_encode([]);
    $result = $this->get($json, 'cripto/' . $uuid, $_SESSION['api_token']);

    if (isset($result->errors) && !empty($result->errors)) {
        return [
            'no' => '10000',
            'type' => 'error',
            'message' => $result->message,
            'errors' => $result->errors
        ];
    }

    return $result;
}

public function verifyUser($data)
{
    if ($data["password"] == null) {
        $data["password"] = '#34ddLst';
    }

    $json = json_encode($data);
    $result = $this->post($json, 'users/simple_auth', $_SESSION['api_token']);

    if (isset($result->errors) && !empty($result->errors)) {
        return [
            'no' => '10000',
            'type' => 'error',
            'message' => $result->message,
            'errors' => $result->errors
        ];
    }

    return $result;
}