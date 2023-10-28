import 'package:flutter/material.dart';

class Input extends StatefulWidget {
  late String _label;

  // const Input({super.key});
  Input(String label) {
    _label = label;
  }

  @override
  State<Input> createState() => _InputState();
}

class _InputState extends State<Input> {
  @override
  Widget build(BuildContext context) {
    return TextFormField(
      decoration: InputDecoration(
          label: Text(
            widget._label,
            style: TextStyle(color: Colors.white30),
          ),
          border: OutlineInputBorder(
            borderSide: BorderSide(color: Colors.white38, width: 1),
          )),
    );
  }
}
