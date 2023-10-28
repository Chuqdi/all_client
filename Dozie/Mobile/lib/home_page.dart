import 'package:flutter/material.dart';
import 'package:flutter_svg/svg.dart';
import 'package:get/get.dart';
import 'package:mobile/components/Buttons.dart';
import 'package:mobile/pages/auth/SignUp.dart';

class HomePage extends StatelessWidget {
  const HomePage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(),
      body: SingleChildScrollView(
        child: Padding(
          padding: const EdgeInsets.all(8.0),
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.start,
            children: [
              Center(
                child: SvgPicture.asset("assets/images/welcome.svg",
                    height: 250, semanticsLabel: 'Acme Logo'),
              ),
              Text(
                "Cover and loans for POS operators",
                style: Theme.of(context).textTheme.bodyLarge,
              ),
              const Text(
                  "Protect your POS business against unforeseen or natural circumstances. Also get a loan to keep your POS business afloat."),
              const SizedBox(
                height: 50,
              ),
              PrimaryButton("Create Account", () {
                Get.to(() => SignUp());
              }),
              const SizedBox(
                height: 20,
              ),
              DefaultButton("Sign In")
            ],
          ),
        ),
      ),
    );
  }
}
