import 'package:flutter/material.dart';

class DefaultButton extends StatelessWidget {
  // const DefaultButton({super.key});
  late void _onClick;
  late String _title;
  DefaultButton(String title) {
    this._title = title;
  }

  @override
  Widget build(BuildContext context) {
    return Container(
        width: double.infinity,
        decoration: BoxDecoration(
          color: Colors.white,
          border: Border.all(
            width: 2,
            color: Colors.grey,
          ),
        ),
        child: Padding(
          padding: const EdgeInsets.all(16.0),
          child: Center(
            child: Text(
              _title,
              style: const TextStyle(
                  color: Colors.black, fontWeight: FontWeight.bold),
            ),
          ),
        ));
  }
}

// ignore: must_be_immutable
class PrimaryButton extends StatelessWidget {
  late String _title;
  late void Function()? _onPress;
  PrimaryButton(String title, void Function()? onPress, {super.key}) {
    _title = title;
    _onPress = onPress;
  }

  @override
  Widget build(BuildContext context) {
    return MaterialButton(
      onPressed: _onPress,
      color: Colors.black,
      minWidth: double.infinity,
      child: Padding(
        padding: const EdgeInsets.all(16.0),
        child: Text(
          _title,
          style:
              const TextStyle(color: Colors.white, fontWeight: FontWeight.bold),
        ),
      ),
    );
  }
}
