String url = 'http://10.0.2.2:8000/api';

class StoreController extends GetxController {
  final isSaving = false.obs;

  Future store({
    required String titreSeance,
  }) async {
    try {
      isSaving.value = true;
      var data = {
        'titreSeance': titreSeance,
      };

      var response = await http.post(
        Uri.parse(url + 'store'),
        headers: {
          'Accept': 'application/json',
        },
        body: data,
      );
      if (response.statusCode == 200) {
        isSaving.value = true;
        debugPrint(json.decode(response.body));
      } else {
        isSaving.value = true;
        debugPrint(json.decode(response.body));
      }
    } catch (e) {
      print(e.toString());
    }
  }
}
