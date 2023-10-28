import 'package:flutter/material.dart';

import '../../components/Input.dart';

class SignUp extends StatefulWidget {
  const SignUp({super.key});

  @override
  State<SignUp> createState() => _SignUpState();
}

class _SignUpState extends State<SignUp> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: SingleChildScrollView(
        child: Padding(
          padding: EdgeInsets.all(10),
          child: SafeArea(
            child: Column(
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                SizedBox(
                  height: 40,
                ),
                const Icon(
                  Icons.arrow_back,
                  color: Colors.black,
                ),
                Text(
                  "Get Started",
                  style: Theme.of(context).textTheme.bodyLarge,
                ),
                const Text("Create An Account"),
                SizedBox(
                  height: 40,
                ),
                Form(
                  child: SingleChildScrollView(
                    child: Column(
                        crossAxisAlignment: CrossAxisAlignment.start,
                        children: [
                          Container(
                            padding: EdgeInsets.only(top: 5),
                            child: Column(
                              crossAxisAlignment: CrossAxisAlignment.start,
                              children: [
                                const Text(
                                  "Full Name",
                                  style: TextStyle(fontStyle: FontStyle.italic),
                                ),
                                Input("Full Name")
                              ],
                            ),
                          ),
                          Container(
                            padding: EdgeInsets.only(top: 5),
                            child: Column(
                              crossAxisAlignment: CrossAxisAlignment.start,
                              children: [
                                const Text(
                                  "Full Name",
                                  style: TextStyle(fontStyle: FontStyle.italic),
                                ),
                                Input("Full Name")
                              ],
                            ),
                          ),
                          Container(
                            padding: EdgeInsets.only(top: 5),
                            child: Column(
                              crossAxisAlignment: CrossAxisAlignment.start,
                              children: [
                                const Text(
                                  "Full Name",
                                  style: TextStyle(fontStyle: FontStyle.italic),
                                ),
                                Input("Full Name")
                              ],
                            ),
                          ),
                          Container(
                            padding: EdgeInsets.only(top: 5),
                            child: Column(
                              crossAxisAlignment: CrossAxisAlignment.start,
                              children: [
                                const Text(
                                  "Full Name",
                                  style: TextStyle(fontStyle: FontStyle.italic),
                                ),
                                Input("Full Name")
                              ],
                            ),
                          ),
                          Container(
                            padding: EdgeInsets.only(top: 5),
                            child: Column(
                              crossAxisAlignment: CrossAxisAlignment.start,
                              children: [
                                const Text(
                                  "Full Name",
                                  style: TextStyle(fontStyle: FontStyle.italic),
                                ),
                                Input("Full Name")
                              ],
                            ),
                          ),
                          Row(
                            children: [
                              Text("Accept terms and Privacy Policy")
                            ],
                          ),
                        ]),
                  ),
                )
              ],
            ),
          ),
        ),
      ),
    );
  }
}
